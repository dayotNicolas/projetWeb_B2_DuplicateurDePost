<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegistrationType;
use App\Form\ResetPassType;
use App\Repository\UsersRepository;
use App\Service\Uploader;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, Uploader $uploader)
    {
        $user = new Users();

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $avatar = $form->get('avatar')->getData();

            $user->setAvatar($uploader->upload($avatar));
            $user->setUpdatedAt(new DateTime());
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('security_login');
        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(Request $request)
    {
        return $this->render('security/login.html.twig');
    }


    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {
    }

    /**
     * @Route("/oubli-pass", name="app_forgotten_password")
     */
    public function forgottenPass(Request $request, UsersRepository $usersRepo, MailerInterface $mailer, TokenGeneratorInterface $tokenGenerator)
    {
        $form = $this->createForm(ResetPassType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $donnees = $form->getData();

            $user = $usersRepo->findOneByEmail($donnees['email']);

            if (!$user) {
                $this->addFlash('danger', 'Cette adresse n\'existe pas');
                return $this->redirectToRoute('security_login');
            }

            $token = $tokenGenerator->generateToken();

            try {
                $user->setResetToken($token);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
            } catch (\Exception $e) {
                $this->addFlash('warning', 'Une erreur est survenue' . $e->getMessage());
                return $this->redirectToRoute('security_login');
            }

            $url = $this->generateUrl('app_reset_password', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);

            $email = (new TemplatedEmail())
                ->from('jeannedupuis28@gmail.com')
                ->to($user->getEmail())
                ->subject('Réinitialiser votre mot de passe Duplicapost')
                ->htmlTemplate('forgot_password/forgot_password_email.html.twig')
                ->context([
                    'url' => $url
                ]);

            $mailer->send($email);

            $this->addFlash('message', 'Un email de réinitialisation vous a été envoyé');
            return $this->redirectToRoute('security_login');
        }

        return $this->render('security/forgotten_password.html.twig', [
            'emailForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/reset-pass/{token}", name="app_reset_password")
     */
    public function resetPassword($token, Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = $this->getDoctrine()->getRepository(Users::class)->findOneBy(['reset_token' => $token]);

        if (!$user) {
            $this->addFlash('danger', 'Token inconnu');
            return $this->redirectToRoute('security_login');
        }

        if ($request->isMethod('POST')) {
            $user->setResetToken(null);

            $hash = $encoder->encodePassword($user, $request->request->get('password'));
            $user->setPassword($hash);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('message', 'Mot de passe modifié avec succès');

            return $this->redirectToRoute('security_login');
        } else {
            return $this->render('security/reset_password.html.twig', [
                'token' => $token
            ]);
        }
    }
}
