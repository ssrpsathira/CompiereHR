<?php

namespace AuthorBundle\Form\Handler;

use AuthorBundle\Entity\Author;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use BaseBundle\Form\Handler\BaseFormHandler;

/**
 * Abstract author form handler
 */
class AuthorFormHandler extends BaseFormHandler
{

    /**
     * @var \AuthorBundle\Entity\Author $author
     */
    protected $author;

    /**
     * @param \Symfony\Component\Form\FormInterface     $form    form object
     * @param \Symfony\Component\HttpFoundation\Request $request http request
     * @param \AuthorBundle\Entity\Author       $author author object
     */
    public function __construct(FormInterface $form, Request $request, Author $author)
    {
        parent::__construct($form, $request);

        $this->author = $author;
    }
}
