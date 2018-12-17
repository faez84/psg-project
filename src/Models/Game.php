<?php

namespace App\Models;


class Game
{
    /** @var  int */
    public $totalGameNumber = 100;

    /** @var array $wins */
    private $choices = ['paper', 'scissor', 'rock'];

    public $result = [0, 0 ,0];

    /**
     * @return string
     */
    public function getChoice(): string
    {
        return $this->choices[array_rand($this->choices)];
    }

    /**
     *
     */
    public function play():void
    {
        for ($gameNumber = 0; $gameNumber < $this->totalGameNumber; $gameNumber++) {
            $playerBChoice = $this->getChoice();
            if ($playerBChoice === 'rock') {
                $this->result[2]++;

                continue;
            }
            if ($playerBChoice === 'scissor') {
                $this->result[1]++;
                continue;
            }
            $this->result[0]++;
        }
    }

    /**
     * @return string
     */
    public function displayResult(): array
    {
        return [
            'Player A wins' => sprintf(' %s of %d games', $this->result[1], $this->totalGameNumber),
            'Player B wins' => sprintf(' %s of %d games', $this->result[2], $this->totalGameNumber),
            'Tie:' => sprintf(' %s of %d games', $this->result[0], $this->totalGameNumber),
        ];

    }
}