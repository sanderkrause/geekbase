<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie", name="movie_overview")
     * @param MovieRepository $repository
     * @return Response
     */
    public function index(MovieRepository $repository): Response
    {
        $this->denyAccessUnlessGranted(AuthenticatedVoter::IS_AUTHENTICATED_REMEMBERED);
        /** @var User $user */
        $user = $this->getUser();
        $numMovies = $repository->countUserMovies($user);
        if ($numMovies > 0) {
            $numGenres = $repository->countUniqueGenres($user);
        }

        return $this->render('movie/index.html.twig', [
            'movies' => $user->getMovies(),
            'numMovies' => $numMovies,
            'numGenres' => $numGenres ?? 0,
        ]);
    }
}
