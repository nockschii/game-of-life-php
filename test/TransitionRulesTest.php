<?php

namespace GameOfLifeTests;

use GameOfLife\Cell;
use GameOfLife\TransitionRules;
use Mockery;
use PHPUnit\Framework\TestCase;

class TransitionRulesTest extends TestCase
{
    private Cell $cell;
    private TransitionRules $transitionRules;

    protected function setUp(): void
    {
        $this->cell = Mockery::mock(Cell::class);
        $this->transitionRules = new TransitionRules();
    }

    /** @test */
    public function shouldBeAliveWhenNeighboursCountIs3AndCellIsDead()
    {
        $this->cell->shouldReceive('isAlive')->andReturnFalse();
        $this->cell->shouldReceive('neighboursCount')->andReturn(3);

        $isAlive = $this->transitionRules->apply($this->cell);

        $this->assertTrue($isAlive);
    }

    /** @test */
    public function shouldBeAliveWhenNeighboursCountIs2AndCellIsAlive()
    {
        $this->cell->shouldReceive('isAlive')->andReturnTrue();
        $this->cell->shouldReceive('neighboursCount')->andReturn(2);

        $isAlive = $this->transitionRules->apply($this->cell);

        $this->assertTrue($isAlive);
    }

    /** @test */
    public function shouldBeAliveWhenNeighboursCountIs3AndCellIsAlive()
    {
        $this->cell->shouldReceive('isAlive')->andReturnTrue();
        $this->cell->shouldReceive('neighboursCount')->andReturn(3);

        $isAlive = $this->transitionRules->apply($this->cell);

        $this->assertTrue($isAlive);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
}
