<?php
/**
 * Created by PhpStorm.
 * User: Benutzer
 * Date: 12/17/2018
 * Time: 12:38 AM
 */

namespace App\Controller;


use App\Models\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GameController extends AbstractController
{
    public function index(Request $request)
    {
        $gmaNumber = intval($request->query->get('gameNumber'));
        $game = new Game($gmaNumber);
        $game->play();

        return $this->render('game.html.twig', [
            'msgs' => $game->displayResult(),
        ]);

    }
}