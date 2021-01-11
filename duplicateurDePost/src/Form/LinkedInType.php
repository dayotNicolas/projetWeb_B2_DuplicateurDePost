<?php

namespace App\Form;

use App\Entity\LinkedIn;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LinkedInType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('linkedIn_login')
            ->add('linkedIn_password')
            ->add('usermail')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LinkedIn::class,
        ]);
    }
}
