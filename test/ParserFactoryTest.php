<?php

namespace GameOfLifeTests;

use GameOfLife\ParserFactory;
use PHPUnit\Framework\TestCase;

class ParserFactoryTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProviderForParserTest
     * @param $filePath
     * @param $expectedGrid
     */
    public function shouldReturnRawGridWhenUsingInputParserForInputFiles($filePath, $expectedGrid): void
    {
        $parserFactory = new ParserFactory($filePath);

        $rawGrid = $parserFactory->parse();

        $this->assertEquals($expectedGrid, $rawGrid);
    }

    public function dataProviderForParserTest(): array
    {
        return [
            "Blinker1.input should return horizontal Blinker" => [
                './test/testPatterns/Blinker1.input',
                [
                    [false, false, false],
                    [true, true, true],
                    [false, false, false]
                ],
            ],
            "Blinker2.input should return vertical Blinker" =>[
                './test/testPatterns/Blinker2.input',
                [
                    [false, true, false],
                    [false, true, false],
                    [false, true, false]
                ],
            ],
            "Blinker1.json should return horizontal Blinker" => [
                './test/testPatterns/Blinker1.json',
                [
                    [false, false, false],
                    [true, true, true],
                    [false, false, false]
                ],
            ],
            "Blinker2.json should return vertical Blinker" => [
                './test/testPatterns/Blinker2.json',
                [
                    [false, true, false],
                    [false, true, false],
                    [false, true, false]
                ],
            ],
        ];
    }
}
