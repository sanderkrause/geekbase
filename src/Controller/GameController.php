<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\User;
use App\Form\GameFormType;
use App\Repository\GameRepository;
use App\Security\Voter\PrivateEntityVoter;
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
            /** @var User $user */
            $user = $this->getUser();
            $game->setUser($user);
            $this->getDoctrine()->getManager()->persist($game);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('game_overview');
        }

        return $this->render('game/form.html.twig', [
            'gameForm' => $gameForm->createView(),
        ]);
    }

    /**
     * @Route("/games/edit/{game}", name="game_edit")
     * @param Request $request
     * @param Game $game
     * @return Response
     */
    public function edit(Request $request, Game $game): Response
    {
        $this->denyAccessUnlessGranted(PrivateEntityVoter::EDIT, $game);
        $gameForm = $this->createForm(GameFormType::class, $game);
        $gameForm->handleRequest($request);
        if ($gameForm->isSubmitted() && $gameForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('game_overview');
        }

        return $this->render('game/form.html.twig', [
            'gameForm' => $gameForm->createView(),
        ]);
    }

    /**
     * @Route("/games/delete/{game}", name="game_delete")
     * @param Game $game
     * @return Response
     */
    public function delete(Game $game): Response
    {
        $this->denyAccessUnlessGranted(PrivateEntityVoter::REMOVE, $game);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($game);
        $entityManager->flush();
        return $this->redirectToRoute('game_overview');
    }
}
