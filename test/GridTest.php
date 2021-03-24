<?php

namespace GameOfLifeTests;

use GameOfLife\Cell;
use GameOfLife\Grid;
use PHPUnit\Framework\TestCase;

class GridTest extends TestCase
{
    private array $raw3x3Grid = [
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

    private Grid $grid;

    protected function setUp(): void
    {
        $this->grid = new Grid($this->raw3x3Grid);
    }

    /** @test
     * @dataProvider expectedNeighboursFor3x3Grid
     * @param $expectedNeighbours
     * @param $position
     */
    public function shouldFindNeighboursGivenValidCellPositionAnd3x3Grid($expectedNeighbours, $position)
    {
        $neighbours = $this->grid->getNeighbours($position["x"], $position["y"]);

        $this->assertEquals($expectedNeighbours, $neighbours);
    }

    public function expectedNeighboursFor3x3Grid()
    {
        return [
            "shouldFind2LivingNeighboursAnd6DeadGivenCellWithPos[1/1]" => [
                [
                    new Cell(),
                    new Cell(true),
                    new Cell(),
                    new Cell(),
                    new Cell(),
                    new Cell(),
                    new Cell(true),
                    new Cell(),
                ],
                [
                    "x" => 1,
                    "y" => 1
                ]
            ],
            "shouldFind2LivingNeighboursAnd6DeadGivenCellWithPos[0/0]" => [
                [

                    new Cell(true),
                    new Cell(),
                    new Cell(true),
                ],
                [
                    "x" => 0,
                    "y" => 0
                ]
            ],
            "shouldFind1LivingNeighbourAnd4DeadGivenCellWithPos[1/0]" => [
                [
                    new Cell(),
                    new Cell(),
                    new Cell(),
                    new Cell(true),
                    new Cell(),
                ],
                [
                    "x" => 1,
                    "y" => 0
                ]
            ],
            "shouldFind1LivingNeighbourAnd4DeadGivenCellWithPos[1/1]" => [
                [
                    new Cell(true),
                    new Cell(true),
                    new Cell(),
                ],
                [
                    "x" => 2,
                    "y" => 0
                ]
            ],
            "shouldFind1LivingNeighbourAnd4DeadGivenCellWithPos[0/1]" => [
                [
                    new Cell(),
                    new Cell(true),
                    new Cell(true),
                    new Cell(),
                    new Cell(true),
                ],
                [
                    "x" => 0,
                    "y" => 1
                ]
            ],
            "shouldFind1LivingNeighbourAnd4DeadGivenCellWithPos[0/2]" => [
                [
                    new Cell(),
                    new Cell(true),
                    new Cell(true),
                ],
                [
                    "x" => 0,
                    "y" => 2
                ]
            ],
            "shouldFind1LivingNeighbourAnd4DeadGivenCellWithPos[1/2]" => [
                [
                    new Cell(),
                    new Cell(true),
                    new Cell(),
                    new Cell(),
                    new Cell(),
                ],
                [
                    "x" => 1,
                    "y" => 2
                ]
            ],
            "shouldFind1LivingNeighbourAnd4DeadGivenCellWithPos[2/2]" => [
                [
                    new Cell(true),
                    new Cell(),
                    new Cell(true),
                ],
                [
                    "x" => 2,
                    "y" => 2
                ]
            ],
        ];
    }
}
