<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil", methods={"GET"})
     */
    public function index(ContactRepository $repo): Response
    {
        
        return $this->render('accueil/index.html.twig', [
            'contactList' => $repo->findAll()
        ]);

    }
}
