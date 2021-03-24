<?php

namespace GameOfLifeTests;

use GameOfLife\Cell;
use PHPUnit\Framework\TestCase;

class CellTest extends TestCase
{
    /** @test */
    public function shouldBeDeadGivenNoOption()
    {
        $cell = new Cell();

        $state = $cell->isAlive();

        $this->assertFalse($state);
    }


    /** @test */
    public function shouldBeAlivePassingStateOntoConstructor()
    {
        $cell = new Cell(true);

        $state = $cell->isAlive();

        $this->assertTrue($state);
    }

    /** @test */
    public function shouldReturnNeighboursCountGivenListWithNeighbours()
    {
        $cell = new Cell();
        $neighbours = [new Cell(true)];
        $cell->setNeighbours($neighbours);

        $neighboursCount = $cell->neighboursCount();

        $this->assertSame(1, $neighboursCount);
    }
}
