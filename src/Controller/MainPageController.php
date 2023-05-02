<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainPageController extends AbstractController
{
    #[Route('/')]
    public function mainPage(): Response
    {
        return $this->render('mainpage.html.twig');
    }
}
