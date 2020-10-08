<?php
// src/AppBundle/Form/RegistrationType.php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;


class RegistrationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('cin')
            ->add('email')
            ->add('password')
            ->add('roles')
            ->add('num_tel')
            ->add('roles', CollectionType::class, array(
                'label' => 'Role',
                'entry_type' => ChoiceType::class,
                'entry_options' => array(
                    'label' => false,
                    'expanded' => false,
                    'choices' => array(
                        'Client' => 'ROLE_CLIENT',
                        'Prestatire' => 'ROLE_PRESTATAIRE',
                        'Admin' => 'ROLE_ADMIN',

                    ),
                    'data' => 'ROLE_CLIENT'
                )
            ))

            ->add('roles', CollectionType::class, array(
                'label' => 'Role',
                'entry_type' => ChoiceType::class,
                'entry_options' => array(
                    'label' => false,
                    'expanded' => false,
                    'choices' => array(
                        'Client' => 'ROLE_CLIENT',


                        'Prestataire'=>'ROLE_PRESTATAIRE',

                    ),
                    'data' => 'ROLE_CLIENT'
                )
            ))



        ;


    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

}