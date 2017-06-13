<?php

namespace AuthorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
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
