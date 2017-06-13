<?php

namespace AuthrBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorType
{

    public function buildForm(FormBuilderInterface $builder)
    {
        $builder->add(
            'name',
            'Symfony\Component\Form\Extension\Core\Type\TextType',
            array(
                'label' => 'label.name',
            )
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'validation_groups' => ['Default'],
                'translation_domain' => 'form',
                'data_class' => 'AuthorBundle\Entity\Author'
            )
        );
    }
}
