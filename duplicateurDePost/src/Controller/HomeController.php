<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Service\Uploader;
use App\Entity\SocialNetwork;
use App\Form\UpdateProfilType;
use App\Form\SocialNetworkType;
use App\Repository\PostRepository;
use App\Repository\UsersRepository;
use App\Form\UpdateProfilPictureType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(UsersRepository $ripo, Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, Uploader $uploader, PostRepository $postRepo): Response
    {
        $sn = new SocialNetwork();
        $user = $this->getUser();
        $form_sn = $this->createForm(SocialNetworkType::class, $sn);

        $form_sn->handleRequest($request);

        if ($form_sn->isSubmitted() && $form_sn->isValid()) {
            //$password = $sn->getNetworkPassword();
            //$hash = crypt($password);
            //$sn->setNetworkPassword($hash);
            $sn->setNetwork($user);
            $manager->persist($sn);
            $manager->flush();
            return $this->redirectToRoute('home');
        }

        $form_update_profil = $this->createForm(UpdateProfilType::class, $user);

        $form_update_profil->handleRequest($request);

        if ($form_update_profil->isSubmitted() && $form_update_profil->isValid()) {

            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();;
            return $this->redirectToRoute('home');
        }

        $form_update_profil_picture = $this->createForm(UpdateProfilPictureType::class, $user);

        $form_update_profil_picture->handleRequest($request);

        if ($form_update_profil_picture->isSubmitted() && $form_update_profil_picture->isValid()) {
            $avatar = $form_update_profil_picture->get('avatar')->getData();

            $user->setAvatar($uploader->upload($avatar));
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('home');
        }

        $userId = $user->getId();
        $posts = $postRepo->findBy(['user' => $userId]);
        return $this->render('home/index.html.twig', [
            'form_social_network' => $form_sn->createView(),
            'form_update_profil' => $form_update_profil->createView(),
            'form_update_profil_picture' => $form_update_profil_picture->createView(),
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/post", name="add_post")
     */
    public function add_post(Request $request, EntityManagerInterface $manager, Uploader $uploader): Response
    {
        $user = $this->getUser();
        $form_update_profil_picture = $this->createForm(UpdateProfilPictureType::class, $user);

        $form_update_profil_picture->handleRequest($request);

        if ($form_update_profil_picture->isSubmitted() && $form_update_profil_picture->isValid()) {
            $avatar = $form_update_profil_picture->get('avatar')->getData();

            $user->setAvatar($uploader->upload($avatar));
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('add_post');
        }

        $post = new Post();
        $form_post = $this->createForm(PostType::class, $post);

        $form_post->handleRequest($request);

        if ($form_post->isSubmitted() && $form_post->isValid()) {
            $picture = $form_post->get('picture')->getData();

            $post->setPicture($uploader->upload($picture));
            $post->setUser($user);
            $manager->persist($post);
            $manager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('home/add_post.html.twig', [
            'form_post' => $form_post->createView(),
            'form_update_profil_picture' => $form_update_profil_picture->createView(),
        ]);
    }
}
