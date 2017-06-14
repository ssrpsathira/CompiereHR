<?php

namespace ArticleBundle\Form\Handler;

use ArticleBundle\Entity\Article;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use BaseBundle\Form\Handler\BaseFormHandler;

/**
 * Abstract article form handler
 */
class ArticleFormHandler extends BaseFormHandler
{

    /**
     * @var \ArticleBundle\Entity\Article $article
     */
    protected $article;

    /**
     * @param \Symfony\Component\Form\FormInterface     $form    form object
     * @param \Symfony\Component\HttpFoundation\Request $request http request
     * @param \ArticleBundle\Entity\Article       $article article object
     */
    public function __construct(FormInterface $form, Request $request, Article $article)
    {
        parent::__construct($form, $request);

        $this->article = $article;
    }
}
