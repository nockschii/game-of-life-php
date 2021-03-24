<?php

namespace GameOfLifeTests;

use Exception;
use GameOfLife\Cell;
use PHPUnit\Framework\TestCase;

class CellTest extends TestCase
{
    private Cell $cell;

    protected function setUp(): void
    {
        $this->cell = new Cell();
    }

    /** @test */
    public function shouldBeDeadByDefaultGivenNoOption()
    {
        $state = $this->cell->isAlive();

        $this->assertFalse($state);
    }

    /**
     * @test
     * @dataProvider givenValidNeighbours
     * @param array $neighbours
     * @param int $expectedCount
     * @throws Exception
     */
    public function shouldReturnCountOfNeighboursGivenValidNeighbours(array $neighbours, int $expectedCount)
    {
        $this->cell->setNeighbours($neighbours);

        $neighboursCount = $this->cell->neighboursCount();

        $this->assertSame($expectedCount, $neighboursCount);
    }

    public function givenValidNeighbours(): array
    {
        return [
            "shouldReturnNeighboursCountGivenListWithOneAliveNeighbour" => [
                [
                    new Cell(true)
                ],
                1
            ],
            "shouldReturnNeighboursCountGivenListTwoAliveCells" => [
                [
                    new Cell(true),
                    new Cell(true)
                ],
                2
            ],
            "shouldReturnNeighboursCountGivenListTwoAliveCellsAndOneDead" => [
                [
                    new Cell(true),
                    new Cell(true),
                    new Cell()
                ],
                2
            ],
            "shouldReturnNeighboursCountGivenList1AliveCellAnd7DeadCells" => [
                [
                    new Cell(true),
                    new Cell(),
                    new Cell(),
                    new Cell(),
                    new Cell(),
                    new Cell(),
                    new Cell(),
                    new Cell(),
                ],
                1
            ],
            "shouldReturnNeighboursCountGivenList4AliveCellAnd4DeadCells" => [
                [
                    new Cell(true),
                    new Cell(true),
                    new Cell(true),
                    new Cell(true),
                    new Cell(),
                    new Cell(),
                    new Cell(),
                    new Cell(),
                ],
                4
            ],
            "shouldReturnNeighboursCountGivenList8AliveCells" => [
                [
                    new Cell(true),
                    new Cell(true),
                    new Cell(true),
                    new Cell(true),
                    new Cell(true),
                    new Cell(true),
                    new Cell(true),
                    new Cell(true),
                ],
                8
            ]
        ];
    }

    /**
     * @test
     * @dataProvider givenInvalidNeighbours
     * @param $neighbours
     * @throws Exception
     */
    public function shouldThrowExceptionWhenNeighboursCountIsMoreThan8($neighbours)
    {
        $this->expectException(Exception::class);
        $this->cell->setNeighbours($neighbours);

        $this->cell->neighboursCount();
    }

    public function givenInvalidNeighbours(): array
    {
        return  [
          "shouldReturnExceptionWhenMoreThan8AliveCells" => [
              [
                  new Cell(true),
                  new Cell(true),
                  new Cell(true),
                  new Cell(true),
                  new Cell(true),
                  new Cell(true),
                  new Cell(true),
                  new Cell(true),
                  new Cell(true)
              ],
              [
                  new Cell(),
                  new Cell(),
                  new Cell(),
                  new Cell(),
                  new Cell(),
                  new Cell(),
                  new Cell(),
                  new Cell(),
                  new Cell(),
              ],
              [
                  new Cell(true),
                  new Cell(true),
                  new Cell(true),
                  new Cell(true),
                  new Cell(),
                  new Cell(),
                  new Cell(),
                  new Cell(),
                  new Cell(),
              ],
          ]
        ];
    }

    /** @test */
    public function shouldBeAlivePassingStateOntoConstructor()
    {
        $cell = new Cell(true);

        $state = $cell->isAlive();

        $this->assertTrue($state);
    }
}
