<?php

namespace VilniusPHP\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VilniusPHPCoreBundle:Default:index.html.twig');
    }
}
