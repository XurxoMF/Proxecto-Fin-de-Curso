<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MainPageController extends AbstractController {

    //Array con ["nome a mostrar", prezo, "imaxe a mostrar"]
    public static $bebidas = [
        ["Café solo", 1.20, "cafe_solo.png"],
        ["Café con leite", 1.30, "cafe_con_leite.png"],
        ["Chocolate", 2.20, "chocolate.png"],
        ["Colacao", 1.50, "colacao.png"],
        ["Infusión", 1.50, "infusion.png"],
        ["1906", 2.10, "1906.png"],
        ["SuperBock", 2.70, "superbock.png"],
        ["Estrella 0,0", 2.10, "estrella_00.png"],
        ["Estrella Galicia", 2.10, "estrella_galicia.png"],
        ["Cubata", 5, "cubata.png"],
        ["Gin Tonic", 5, "gin_tonic.png"],
        ["Vermut", 2.50, "vermut.png"],
        ["Chupito de licor", 1.70, "licor.png"],
        ["Agua 500cl", 1.10, "agua.png"],
        ["Cacaolat", 1.90, "cacaolat.png"],
        ["Cocacola", 2, "cocacola.png"],
        ["Kas", 1.90, "kas.png"],
        ["Nestea", 2, "nestea.png"],
        ["Redbull", 2.30, "redbull.png"],
        ["Tónica", 1.90, "tonica.png"],
        ["Zumo", 1.90, "zumo.png"],
        ["Zumo natural", 2.30, "zumo_natural.png"]
    ];
    
    //Array con ["nome a mostrar", prezo, "imaxe a mostrar"]
    public static $tortas = [
        ["Torta de nata", 16, "torta_nata.png"],
        ["Torta de chocolate", 20, "torta_chocolate.png"],
        ["Torta de arándanos", 20, "torta_arandanos.png"],
        ["Torta de sabugueiro", 20, "torta_baya_de_sauco.png"],
        ["Torta de caramelo", 20, "torta_caramelo.png"],
        ["Torta de dulce de leite", 20, "torta_dulce_de_leche.png"],
        ["torta de ferrero rochert", 20, "torta_ferrero_rochert.png"],
        ["Torta de kinder", 20, "torta_kinder.png"],
        ["Torta de noz", 20, "torta_nuez.png"],
        ["Torta de praliné", 20, "torta_praline.png"],
    ];

    #[Route(path: '/', name: 'app_mainpage')]
    public function mainPage(): Response {
        return $this->render('mainpage.html.twig', [
                    "bebidas" => $this::$bebidas,
                    "tortas" => $this::$tortas
        ]);
    }

}
