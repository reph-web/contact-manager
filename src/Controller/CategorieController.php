<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function index(CategorieRepository $repo): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
            'catList' => $repo->findAll()
        ]);
    }

    /**
     * @Route("/categorie/{id}", name="detailCategorie", methods={"GET"})
     */
    public function detailCategorie($id, CategorieRepository $repo): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
            'catList' => [$repo->find($id)]
        ]);
    }

}