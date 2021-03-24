<?php

namespace GameOfLife;

class InputParser implements GridParser
{
    private string $activeCell;

    public function parse(string $filePath): array
    {
        return $this->parseRawGrid($filePath);
    }

    private function parseRawGrid(string $filePath): array
    {
        $input = file_get_contents($filePath);
        $lines = explode("\n", $input);
        $grid = $this->extractGrid($lines);

        return $this->convertGrid($grid);
    }

    private function extractGrid(array $lines): array
    {
        $this->activeCell = array_shift($lines);
        array_pop($lines); // removes last new line

        $grid = [];
        foreach ($lines as $line) {
            $grid[] = str_split($line);
        }

        return $grid;
    }

    private function convertGrid(array $grid): array
    {
        $converted = [];

        foreach ($grid as $posY => $line) {
            foreach ($line as $posX => $cell) {
                $converted[$posY][$posX] = $this->translate($cell);
            }
        }

        return $converted;
    }

    private function translate($cell): bool
    {
        return $cell === $this->activeCell;
    }
}
