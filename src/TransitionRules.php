<?php

namespace GameOfLife;

class TransitionRules
{
    public function apply(Cell $cell): bool
    {
        if (!$cell->isAlive()) {
            return $cell->neighboursCount() === 3;
        }

        return $cell->neighboursCount() === 2 || $cell->neighboursCount() === 3;
    }
}
