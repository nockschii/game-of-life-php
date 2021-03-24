<?php

namespace GameOfLife;

class TransitionRules
{
    public function apply(Cell $cell)
    {
        if ($cell->isAlive()) {
            return $cell->neighboursCount() === 2;
        } elseif (!$cell->isAlive()) {
            return $cell->neighboursCount() === 3;
        }

        return false;
    }
}
