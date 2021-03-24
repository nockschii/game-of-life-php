<?php

namespace GameOfLifeTests;

use GameOfLife\GameOfLife;
use GameOfLife\Grid;
use GameOfLife\ParserFactory;
use GameOfLife\TransitionRules;
use Mockery;
use PHPUnit\Framework\TestCase;

class GameOfLifeTest extends TestCase
{
    /** @test */
    public function shouldReturnRawGridAfterOneInteration()
    {
        $transitionRules = new TransitionRules();
        $parserFactory = new ParserFactory("testPatterns/Blinker1.input");
        $grid = new Grid($parserFactory->parse());
        $gameOfLife = new GameOfLife($transitionRules, $parserFactory, $grid);
        $expectedGridAfterOneIteration = [
            1 => [
                [false, true, false],
                [false, true, false],
                [false, true, false]
            ],
        ];

        $oneYearLater = $gameOfLife->iterate(1);

        $this->assertEquals($expectedGridAfterOneIteration, $oneYearLater);
    }
}


