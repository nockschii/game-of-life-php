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
    public function shouldBeAliveWhenNeighboursCountIsExactly3AndCellIsDead()
    {
        $this->cell->shouldReceive('isAlive')->andReturnFalse();
        $this->cell->shouldReceive('neighboursCount')->andReturn(3);

        $isAlive = $this->transitionRules->apply($this->cell);

        $this->assertTrue($isAlive);
    }

    /** @test */
    public function shouldBeAliveWhenNeighboursCountIsNot3AndCellIsDead()
    {
        $this->cell->shouldReceive('neighboursCount')->andReturn(2);
        $this->cell->shouldReceive('isAlive')->andReturnFalse();

        $isAlive = $this->transitionRules->apply($this->cell);

        $this->assertFalse($isAlive);
    }

    /** @test */
    public function shouldBeAliveWhenNeighboursCountIs2AndCellIsAlive()
    {
        $this->cell->shouldReceive('neighboursCount')->andReturn(2);
        $this->cell->shouldReceive('isAlive')->andReturnTrue();

        $isAlive = $this->transitionRules->apply($this->cell);

        $this->assertTrue($isAlive);
    }

    /** @test */
    public function shouldBeAliveWhenNeighboursCountIs3AndCellIsAlive()
    {
        $this->cell->shouldReceive('neighboursCount')->andReturn(3);
        $this->cell->shouldReceive('isAlive')->andReturnTrue();

        $isAlive = $this->transitionRules->apply($this->cell);

        $this->assertTrue($isAlive);
    }

    /** @test */
    public function shouldBeDeadWhenNeighboursCountLessThan2AndCellIsAlive()
    {
        $this->cell->shouldReceive('neighboursCount')->andReturn(1);
        $this->cell->shouldReceive('isAlive')->andReturnTrue();

        $isAlive = $this->transitionRules->apply($this->cell);

        $this->assertFalse($isAlive);
    }

    /** @test */
    public function shouldBeDeadWhenNeighboursCountMoreThan3AndCellIsAlive()
    {
        $this->cell->shouldReceive('neighboursCount')->andReturn(4);
        $this->cell->shouldReceive('isAlive')->andReturnTrue();

        $isAlive = $this->transitionRules->apply($this->cell);

        $this->assertFalse($isAlive);
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
}
