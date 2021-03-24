<?php

namespace GameOfLife;

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
        return 1;
    }

    public function setNeighbours(array $neighbours)
    {
        $this->neighbours = $neighbours;
    }
}
