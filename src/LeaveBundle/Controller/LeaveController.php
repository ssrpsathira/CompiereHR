<?php

namespace LeaveBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;

class LeaveController extends FOSRestController
{
    public function listAction()
    {
        return new Response('Working', Response::HTTP_OK);
    }
}