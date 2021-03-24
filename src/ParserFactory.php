<?php

namespace GameOfLife;

class ParserFactory
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function parse(): array
    {
        $className = $this->getParser();
        /** @var GridParser $parser */
        $parser = new $className();
        return $parser->parse($this->filePath);
    }

    private function getParser(): string
    {
        $fileEnding = ucfirst($this->extractFileType());

        return  "\\GameOfLife\\{$fileEnding}Parser";
    }

    private function extractFileType(): string
    {
        return pathinfo($this->filePath)["extension"];
    }
}
