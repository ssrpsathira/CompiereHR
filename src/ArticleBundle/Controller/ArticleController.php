<?php

namespace ArticleBundle\Controller;
use ArticleBundle\Entity\Article;
use ArticleBundle\Form\Handler\ArticleFormHandler;
use ArticleBundle\Form\Type\ArticleType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Created by PhpStorm.
 * User: ssrp
 * Date: 13/06/17
 * Time: 8:05 PM
 */
class ArticleController extends FOSRestController
{
    public function listAction()
    {

    }

    public function addAction(Request $request)
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);
        $formHandler = new ArticleFormHandler($form, $request, $article);

        $authors = $request->request->get('authors');
        $request->request->remove('authors');

        if ($formHandler->process()) {
            $em = $this->get('doctrine.orm.entity_manager');

            $authors = $em->getRepository('AuthorBundle:Author')->findById($authors);
            $article->setAuthors($authors);

            $em->persist($article);
            $em->flush();

            return new Response('',Response::HTTP_CREATED);
        }
var_dump($form->getErrors()->current()->getCause());die;
        return new Response('Invalid parameters', Response::HTTP_BAD_REQUEST);
    }
}