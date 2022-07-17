<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movies', name: 'movie_')]
class MovieController extends AbstractController
{
    #[Route('/', name: 'index', methods:['GET', 'HEAD'])]
    public function index(MovieRepository $movieRepository): Response
    {
        return $this->render('movie/index.html.twig', [
            'list_movie' => $movieRepository->findAll(),
        ]);
    }
    
    #[Route('/{id}', name: 'show', defaults:['id' => null], methods:['GET', 'HEAD'])]
    public function showMovie(Movie $movie): Response {
        dump($movie);
        return $this->render('movie/show.html.twig', [
            'movie' => $movie
        ]);
    }
}
