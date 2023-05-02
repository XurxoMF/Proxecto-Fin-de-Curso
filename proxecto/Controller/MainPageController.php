<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class MainPageController
{
    public function render(): Response
    {
        return $this->render('mainpage.html.twig');
    }
}
