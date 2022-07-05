<?php

namespace Application\Controller;

use Application\TemplateEngine;

class DefaultController implements ControllerInterface
{
    /**
     * @var TemplateEngine
     */
    private $templateEngine;

    /**
     * DefaultController constructor.
     * @param TemplateEngine $templateEngine
     */
    public function __construct(TemplateEngine $templateEngine)
    {
        $this->templateEngine = $templateEngine;
    }

    /**
     * @inheritDoc
     */
    public function index()
    {
        $this->templateEngine->render('layout.twig');
    }
}