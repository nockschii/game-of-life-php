<?php

namespace GameOfLife;

class JsonParser implements GridParser
{
    private string $activeCell;

    public function parse(string $filePath): array
    {
        $input = file_get_contents($filePath);
        $decoded = json_decode($input, true);
        $this->activeCell = array_shift($decoded); //removes first line

        return $this->convertGrid($decoded['raw_grid']);
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

    private function translate(string $cell): bool
    {
        return $cell === $this->activeCell;
    }
}
