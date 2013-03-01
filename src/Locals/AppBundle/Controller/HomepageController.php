<?php

namespace Locals\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    public function HomepageAction()
    {
        return $this->render('LocalsAppBundle:Homepage:index.html.twig');
    }
}
