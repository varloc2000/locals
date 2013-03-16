<?php

namespace Locals\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RentController extends Controller
{
    public function listAction()
    {
        return $this->render('LocalsAppBundle:Rent:list.html.twig');
    }
    
    public function showAction($id)
    {
        return $this->render('LocalsAppBundle:Rent:show.html.twig');
    }
}
