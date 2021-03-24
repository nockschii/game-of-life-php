<?php

namespace GameOfLifeTests;

use GameOfLife\Cell;
use GameOfLife\Grid;
use PHPUnit\Framework\TestCase;

class GridTest extends TestCase
{
    /** @test */
    public function shouldDoSomething()
    {
        $rawGrid = [
            [
                false, true, false
            ],
            [
                false, true, false
            ],
            [
                false, true, false
            ]
        ];
        $grid = new Grid($rawGrid);
        $expectedNeighbours = [
            new Cell(),
            new Cell(true),
            new Cell(),
            new Cell(),
            new Cell(),
            new Cell(),
            new Cell(true),
            new Cell(),
        ];

        $neighbours = $grid->getNeighbours(1, 1);

        $this->assertEquals($expectedNeighbours, $neighbours);
    }
}
