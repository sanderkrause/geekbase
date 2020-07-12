<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    /**
     * @Route("/games", name="game_overview")
     * @return Response
     */
    public function index(): Response
    {
        $games = [];
        $user = $this->getUser();
        if ($user instanceof User) {
            $games = $user->getGames();
        }
        return $this->render('game/index.html.twig', [
            'games' => $games,
        ]);
    }
}
