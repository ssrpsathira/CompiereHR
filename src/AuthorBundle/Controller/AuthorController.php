<?php

namespace AuthorBundle\Controller;

use AuthorBundle\Entity\Author;
use AuthorBundle\Form\Handler\AuthorFormHandler;
use AuthorBundle\Form\Type\AuthorType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Created by PhpStorm.
 * User: ssrp
 * Date: 13/06/17
 * Time: 8:05 PM
 */
class AuthorController extends FOSRestController
{
    public function addAction(Request $request)
    {
        $author = new Author();

        $form = $this->createForm(AuthorType::class, $author);
        $formHandler = new AuthorFormHandler($form, $request, $author);

        if ($formHandler->process()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($author);
            $em->flush();

            return new Response('',Response::HTTP_CREATED);
        }

        return new Response('Invalid parameters', Response::HTTP_BAD_REQUEST);
    }
}