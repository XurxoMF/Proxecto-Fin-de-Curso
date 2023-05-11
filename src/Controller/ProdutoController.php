<?php

namespace App\Controller;

use App\Entity\Produto;
use App\Form\ProdutoType;
use App\Repository\ProdutoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Doctrine\ORM\QueryAdapter;

#[Route('/produtos')]
class ProdutoController extends AbstractController
{
    #[Route('/', name: 'app_produto_index', methods: ['GET'])]
    public function index(ProdutoRepository $produtoRepository, Request $request): Response
    {
        $queryBuilder = $produtoRepository->findAllPager();
        
        $pagerfanta = new Pagerfanta(new QueryAdapter($queryBuilder));
        $pagerfanta->setMaxPerPage(10);
        $pagerfanta->setCurrentPage($request->query->get('page', 1));
        
        return $this->render('produto/index.html.twig', [
            'produtos' => $pagerfanta,
        ]);
    }

    #[Route('/new', name: 'app_produto_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProdutoRepository $produtoRepository): Response
    {
        $produto = new Produto();
        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $produtoRepository->save($produto, true);

            return $this->redirectToRoute('app_produto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produto/new.html.twig', [
            'produto' => $produto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_produto_show', methods: ['GET'])]
    public function show(Produto $produto): Response
    {
        return $this->render('produto/show.html.twig', [
            'produto' => $produto,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_produto_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Produto $produto, ProdutoRepository $produtoRepository): Response
    {
        $form = $this->createForm(ProdutoType::class, $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $produtoRepository->save($produto, true);

            return $this->redirectToRoute('app_produto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produto/edit.html.twig', [
            'produto' => $produto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_produto_delete', methods: ['POST'])]
    public function delete(Request $request, Produto $produto, ProdutoRepository $produtoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produto->getId(), $request->request->get('_token'))) {
            $produtoRepository->remove($produto, true);
        }

        return $this->redirectToRoute('app_produto_index', [], Response::HTTP_SEE_OTHER);
    }
}
