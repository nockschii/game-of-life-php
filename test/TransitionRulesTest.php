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

    /**
     * @test
     * @dataProvider stubInformation
     * @param int $neighboursCount
     * @param bool $startingState
     * @param bool $expectedState
     */
    public function shouldBeDeadWhenNeighboursCountMoreThan3AndCellIsAlive(int $neighboursCount, bool $startingState, bool $expectedState)
    {
        $this->cell->shouldReceive('neighboursCount')->andReturn($neighboursCount);
        $this->cell->shouldReceive('isAlive')->andReturn($startingState);

        $isAlive = $this->transitionRules->apply($this->cell);

        $this->assertSame($expectedState, $isAlive);
    }

    public function stubInformation()
    {
        return [
            "shouldBeAliveWhenNeighboursCountIsExactly3AndCellIsDead" => [3, false, true],
            "shouldBeAliveWhenNeighboursCountIsNot3AndCellIsDead" => [2, false, false],
            "shouldBeAliveWhenNeighboursCountIs2AndCellIsAlive" => [2, true, true],
            "shouldBeAliveWhenNeighboursCountIs3AndCellIsAlive" => [3, true, true],
            "shouldBeDeadWhenNeighboursCountLessThan2AndCellIsAlive" => [1, true, false],
            "shouldBeDeadWhenNeighboursCountMoreThan3AndCellIsAlive" => [4, true, false],
        ];
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
}
