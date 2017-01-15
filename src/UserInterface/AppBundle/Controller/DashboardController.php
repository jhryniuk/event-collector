<?php

namespace App\UserInterface\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Dashboard:index.html.twig');
    }
}
