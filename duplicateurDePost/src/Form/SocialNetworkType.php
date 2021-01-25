<?php

namespace App\Form;

use App\Entity\Users;
use App\Entity\SocialNetwork;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SocialNetworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('network_name', ChoiceType::class, [
                'label' => 'Quel réseau?',
                'choices' => [
                    'Facebook' => 'facebook',
                    'Twitter' => 'twitter',
                    'Instagram' => 'instagram',
                    'LinkedIn' => 'linkedIn',
                ],
            ])
            ->add('network_login', TextType::class, [
                'label' => 'Login',
            ])
            ->add('network_password', TextType::class, [
                'label' => 'Mot de passe',
            ])
            ->add(
                'Ajouter',
                SubmitType::class,
                ['row_attr' => [
                    'id' => 'js-modal-close'
                ]]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SocialNetwork::class,
        ]);
    }
}
