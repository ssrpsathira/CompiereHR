<?php

namespace ArticleBundle\Form\Type;

use AuthorBundle\Form\Type\AuthorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Valid;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'title',
            'Symfony\Component\Form\Extension\Core\Type\TextType',
            array(
                'label' => 'label.title',
            )
        );

        $builder->add(
            'url',
            'Symfony\Component\Form\Extension\Core\Type\UrlType',
            array(
                'label' => 'label.url',
            )
        );

        $builder->add(
            'content',
            'Symfony\Component\Form\Extension\Core\Type\TextareaType',
            array(
                'label' => 'label.content',
            )
        );
        
        parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'validation_groups' => ['Default'],
                'translation_domain' => 'form',
                'data_class' => 'ArticleBundle\Entity\Article'
            )
        );
        
        parent::configureOptions($resolver);
    }
}
