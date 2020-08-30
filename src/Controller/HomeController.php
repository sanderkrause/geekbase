<?php

namespace App\Controller;

use App\Repository\BoardGameRepository;
use App\Repository\BookRepository;
use App\Repository\GameRepository;
use App\Repository\GenreRepository;
use App\Repository\MangaRepository;
use App\Repository\MovieRepository;
use App\Repository\PublisherRepository;
use App\Repository\SerieRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * This is intended as the home page for unauthenticated and anonymous users, including links to the login page
     * @Route("/", name="home")
     *
     * @param GameRepository $gameRepository
     * @param UserRepository $userRepository
     * @param MovieRepository $movieRepository
     * @param SerieRepository $serieRepository
     * @param BookRepository $bookRepository
     * @param BoardGameRepository $boardGameRepository
     * @param MangaRepository $mangaRepository
     * @param GenreRepository $genreRepository
     * @param PublisherRepository $publisherRepository
     * @return Response
     */
    public function index(GameRepository $gameRepository, UserRepository $userRepository, MovieRepository $movieRepository, SerieRepository $serieRepository, BookRepository $bookRepository, BoardGameRepository $boardGameRepository, MangaRepository $mangaRepository, GenreRepository $genreRepository, PublisherRepository $publisherRepository): Response
    {
        $totalGames = $gameRepository->count([]);
        $totalUsers = $userRepository->count([]);
        $totalMovies = $movieRepository->count([]);
        $totalSeries = $serieRepository->count([]);
        $totalBooks = $bookRepository->count([]);
        $totalMangas = $mangaRepository->count([]);
        $totalBoardGames = $boardGameRepository->count([]);
        $totalGenres = $genreRepository->count([]);
        $totalPublishers = $publisherRepository->count([]);
        return $this->render('home/index.html.twig', [
            'totalGames' => $totalGames,
            'totalUsers' => $totalUsers,
            'totalMovies' => $totalMovies,
            'totalSeries' => $totalSeries,
            'totalBooks' => $totalBooks,
            'totalMangas' => $totalMangas,
            'totalBoardGames' => $totalBoardGames,
            'totalGenres' => $totalGenres,
            'totalPublishers' => $totalPublishers,
        ]);
    }

    /**
     * This page is the landing page for authenticated users, containing user-sensitive information
     * @Route("/dashboard", name="dashboard")
     * @return Response
     */
    public function dashboard(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        return $this->render('home/dashboard.html.twig');
    }
}
