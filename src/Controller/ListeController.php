<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Structures;
use App\Repository\PartenaireRepository;
use App\Repository\StructuresRepository;

class ListeController extends AbstractController
{
    #[Route('/liste', name: 'app_liste')]
    public function index(): Response
    {
        return $this->render('liste/index.html.twig', [
            'controller_name' => 'ListeController',
        ]);
    }

    #[Route('/liste', name: 'app_structures_liste')]
    public function liste(StructuresRepository $structuresRepository): Response
    {
        return $this->render('liste/liste_struc.html.twig', [
            'structures' => $structuresRepository->findAll(),]
    );
    }

    #[Route('/liste', name: 'app_part_liste')]
    public function list(PartenaireRepository $partenaireRepository): Response
    {
        return $this->render('liste/liste_part.html.twig', [
            'partenaires' => $partenaireRepository->findAll(),]
    );
    }
}
