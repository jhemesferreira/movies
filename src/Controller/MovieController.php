<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MovieController extends AbstractController
{
    #[Route('/', name: 'index', methods:['GET', 'HEAD'])]
    public function index(): Response
    {
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
        ]);
    }
    
    #[Route('/{slug}', name: 'show', defaults:['name' => null], methods:['GET', 'HEAD'])]
    public function showMovie(string $slug): Response {
        return $this->json([
            'message' => $slug, 
            'hi'=> 'hrehrhe'
        ]);
    }
}
