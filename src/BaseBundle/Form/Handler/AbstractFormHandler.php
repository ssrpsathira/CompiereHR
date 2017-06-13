<?php

namespace BaseBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractFormHandler
{
    protected $form;
    protected $request;

    public function __construct(FormInterface $form, Request $request)
    {
        $this->form = $form;
        $this->request = $request;
    }

    public function process()
    {
        if ($this->request->files->count() == 0) {
            if ($this->request->isMethod('POST')
                    || $this->request->isMethod('PUT')
                    || $this->request->isMethod('PATCH')
                ) {
                $this->form->submit($this->request->request->all(), !$this->request->isMethod('PATCH'));
            }
        } else {
            // see http://symfony.com/doc/current/cookbook/doctrine/file_uploads.html
            // for more info about using form->handleRequest
            $this->form->handleRequest($this->request);
        }

        if ($this->form->isValid()) {
            $this->onSuccess();

            return true;
        }

        return false;
    }

    abstract protected function onSuccess();
}
