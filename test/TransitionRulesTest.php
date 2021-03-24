<?php

namespace GameOfLifeTests;

use GameOfLife\Cell;
use GameOfLife\TransitionRules;
use Mockery;
use PHPUnit\Framework\TestCase;

class TransitionRulesTest extends TestCase
{
    /** @test */
    public function shouldBeAliveWhenNeighboursCountIs3AndCellIsDead()
    {
        $cell = Mockery::mock(Cell::class);
        $cell->shouldReceive('neighboursCount')->once()->andReturn(3);
        $cell->shouldReceive('isAlive')->once()->andReturnFalse();
        $transitionRules = new TransitionRules();

        $isAlive = $transitionRules->apply($cell);

        $this->assertTrue($isAlive);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
}
