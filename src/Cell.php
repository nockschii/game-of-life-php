<?php

namespace GameOfLife;

class Cell
{
    private bool $isAlive;

    public function __construct($isAlive = false)
    {
        $this->isAlive = $isAlive;
    }

    public function isAlive(): bool
    {
        return $this->isAlive;
    }
}
