<?php

namespace GameOfLife;

class Grid
{
    private ?array $rawGrid;
    private array $grid;

    public function __construct(?array $rawGrid)
    {
        $this->rawGrid = $rawGrid;
        $this->initialize();
    }

    private function initialize(): void
    {
        foreach ($this->rawGrid as $posY => $line) {
            foreach ($line as $posX => $cellState) {
                $this->grid[$posY][$posX] = new Cell($cellState);
            }
        }
    }

    public function getNeighbours(int $posX, int $posY)
    {
        $neighbours = [];
        for ($y = $posY - 1; $y < $posY + 2; $y++) {
            for ($x = $posX - 1; $x < $posX + 2; $x++) {
                if ($x === $posX && $y === $posY) {
                    continue;
                }
                $neighbours[] = $this->grid[$y][$x];
            }
        }

        return $neighbours;
    }
}
