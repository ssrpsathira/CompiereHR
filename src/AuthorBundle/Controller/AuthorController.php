<?php

namespace AuthorBundle\Controller;
use AuthorBundle\Entity\Author;
use AuthrBundle\Form\Type\AuthorType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: ssrp
 * Date: 13/06/17
 * Time: 8:05 PM
 */
class AuthorController extends FOSRestController
{
    public function listAction()
    {

    }

    public function addAction(Request $request)
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
    }
}