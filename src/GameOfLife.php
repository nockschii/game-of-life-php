<?php

namespace GameOfLife;

class GameOfLife
{
    private Grid $grid;
    private TransitionRules $transitionRules;
    private ParserFactory $parserFactory;
    private Generations $generations;

    public function __construct(TransitionRules $transitionRules, ParserFactory $parserFactory, Grid $grid)
    {
        $this->transitionRules = $transitionRules;
        $this->parserFactory = $parserFactory;
        $this->grid = $grid;
    }
    
    public function iterate(int $years): Generations
    {
        $this->countNeighbours();
        $this->applyGameOfLife($years);

        return $this->generations;
    }

    private function countNeighbours(): void
    {
        foreach ($this->grid as $posY => $line) {
            /** @var Cell $cell */
            foreach ($line as $posX => $cell) {
                $cell->setNeighbours($this->grid->getNeighbours($posX, $posY));
            }
        }
    }

    private function applyGameOfLife(int $years)
    {
        $iteratedGrid = [];

        for ($i = 0; $i < $years; $i++) {
            $this->applyRules();
        }

        return $iteratedGrid;
    }

    private function applyRules()
    {
        foreach ($this->grid as $posY => $line) {
            /** @var Cell $cell */
            foreach ($line as $posX => $cell) {
                $iteratedGrid[] = $this->transitionRules->apply($cell);
            }
        }
    }
}
