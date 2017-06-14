<?php

namespace ArticleBundle\Controller;

use ArticleBundle\Entity\Article;
use ArticleBundle\Form\Handler\ArticleFormHandler;
use ArticleBundle\Form\Type\ArticleType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Templating\TemplateReference;
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
        $em = $this->get('doctrine.orm.entity_manager');
        $articles = $em->getRepository('ArticleBundle:Article')->findAll();
        $content = $this->renderView('ArticleBundle:Article:list.json_v1.twig', array('articles' => $articles));

        return new Response($content, Response::HTTP_OK);
    }

    public function viewAction(Article $article)
    {
        $content = $this->renderView('ArticleBundle:Article:view.json_v1.twig', array('article' => $article));

        return new Response($content, Response::HTTP_OK);
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

            if (count($authors) == 0) {
                return new Response('Author not found', Response::HTTP_NOT_FOUND);
            }

            foreach ($authors as $author) {
                $author->addArticle($article);
                $em->persist($author);
            }

            $em->persist($article);
            $em->flush();

            return new Response('', Response::HTTP_CREATED);
        }

        return new Response('Invalid parameters', Response::HTTP_BAD_REQUEST);
    }
}