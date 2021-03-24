<?php

namespace GameOfLife;

use Exception;

class Cell
{
    private bool $isAlive;
    private array $neighbours;

    public function __construct($isAlive = false)
    {
        $this->isAlive = $isAlive;
    }

    public function isAlive(): bool
    {
        return $this->isAlive;
    }

    public function neighboursCount(): int
    {
        $count = 0;
        foreach ($this->neighbours as $neighbour) {
            if ($neighbour->isAlive()) {
                $count++;
            }
        }

        return $count;
    }

    public function setNeighbours(array $neighbours): void
    {
        if (count($neighbours) > 8) {
            throw new Exception();
        }
        $this->neighbours = $neighbours;
    }
}
