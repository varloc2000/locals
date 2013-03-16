<?php

namespace Locals\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomepageController extends Controller
{
    public function homepageAction()
    {
        return $this->render('LocalsAppBundle:Homepage:index.html.twig');
    }
}
