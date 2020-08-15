<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\User;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenreController extends AbstractController
{
    /**
     * @Route("/genre", name="genre_overview")
     * @param GenreRepository $repository
     * @return Response
     */
    public function index(GenreRepository $repository): Response
    {
        $user = $this->getUser();
        if ($user instanceof User) {
            $userGenres = $repository->getUserGenres($user);
        }

        return $this->render('genre/index.html.twig', [
            'userGenres' => $userGenres ?? [],
            'genres' => $repository->getSortedGenres('name'),
        ]);
    }

    /**
     * @Route("/genre/{genre}", name="genre_detail")
     * @param Genre $genre
     * @return Response
     */
    public function listGames(Genre $genre): Response
    {
        return $this->render('genre/detail.html.twig', [
            'genre' => $genre,
            'games' => $genre->getGames(),
        ]);
    }
}
