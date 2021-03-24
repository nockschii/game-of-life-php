<?php

namespace GameOfLife;

interface GridParser
{
    public function parse(string $filePath): array;
}
