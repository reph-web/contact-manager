<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function listeCategorie(CategorieRepository $repo): Response
    {   
        return $this->render('categorie/listeCategorie.html.twig', [
            'controller_name' => 'CategorieController',
            'catList' => $repo->findAll()
        ]);
    }

    /**
     * @Route("/categorie/{id}/{prevCont?}", name="detailCategorie", methods={"GET"})
     */
    public function detailCategorie($id, $prevCont, CategorieRepository $repo): Response
    {
        return $this->render('categorie/listeCategorie.html.twig', [
            'controller_name' => 'CategorieController',
            'catList' => [$repo->find($id)],
            'prevCont' => $prevCont
        ]);
    }

}