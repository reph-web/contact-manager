<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contacts", name="contacts")
     */
    public function index(ContactRepository $repo): Response
    {
        #{$manager = $this ->getDoctrine()->getManager();}#
        #{$repo = $manager->getRepository(Contact::class);}#
        $contacts = $repo->findAll();
        return $this->render('contact/listeContact.html.twig', [
            'controller_name' => 'ContactController',
            'contactList' => $contacts
        ]);
    }

    /**
     * @Route("/contact/{id}", name="ficheContact", methods={"GET"})
     */
    public function ficheContact($id, ContactRepository $repo): Response
    {
        $contact = $repo->find($id);
        return $this->render('contact/listeContact.html.twig', [
            'controller_name' => 'ContactController',
            'contactList' => [$contact]
        ]);
    }
}
