<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\User;
use App\Form\GameFormType;
use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter;

class GameController extends AbstractController
{
    /**
     * @Route("/games", name="game_overview")
     * @param GameRepository $gameRepository
     * @return Response
     */
    public function index(GameRepository $gameRepository): Response
    {
        $this->denyAccessUnlessGranted(AuthenticatedVoter::IS_AUTHENTICATED_REMEMBERED);
        /** @var User $user */
        $user = $this->getUser();
        $numGames = $gameRepository->countUserGames($user);
        if ($numGames > 0) {
            $numSpecialEditions = $gameRepository->countSpecialEditions($user);
            $percentSpecialEditions = round(($numSpecialEditions / $numGames) * 100);
            $numGenres = $gameRepository->countUniqueGenres($user);
        }

        return $this->render('game/index.html.twig', [
            'games' => $user->getGames(),
            'numGames' => $numGames,
            'numSpecialEditions' => $numSpecialEditions ?? 0,
            'percentSpecialEditions' => $percentSpecialEditions ?? 0,
            'numGenres' => $numGenres ?? 0,
        ]);
    }

    /**
     * @Route("/games/add", name="game_add")
     * @param Request $request
     * @return Response
     */
    public function add(Request $request): Response
    {
        $this->denyAccessUnlessGranted(AuthenticatedVoter::IS_AUTHENTICATED_REMEMBERED);
        $gameForm = $this->createForm(GameFormType::class, new Game());
        $gameForm->handleRequest($request);
        if ($gameForm->isSubmitted() && $gameForm->isValid()) {
            /** @var Game $game */
            $game = $gameForm->getData();
            $game->setUser($this->getUser());
            $this->getDoctrine()->getManager()->persist($game);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('game_overview');
        }

        return $this->render('game/add.html.twig', [
            'gameForm' => $gameForm->createView(),
        ]);
    }
}
