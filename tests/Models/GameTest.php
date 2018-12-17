<?php

namespace App\tests\Models;

use App\Models\Game;
use PHPUnit\Framework\TestCase;


class testGame extends TestCase
{
    /** @var  Game */
    private $game;

    public function setUp()
    {
        $this->game = new Game();
    }
    public function testGetChoice()
    {
        $this->assertTrue(in_array($this->game->getChoice(), ['paper', 'scissor', 'rock']));
    }

    public function testDisplayResult()
    {
        $result = $this->game->displayResult();
        $this->assertArrayHasKey('Player A wins', $result);
        $this->assertArrayHasKey('Player B wins', $result);
        $this->assertArrayHasKey('Tie:', $result);
    }

    public function testPlay()
    {
       $this->game->play();
       $this->assertEquals($this->game->totalGameNumber, $this->game->result[0] + $this->game->result[1] + $this->game->result[2]);
    }
}