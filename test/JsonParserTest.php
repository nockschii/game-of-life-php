<?php

namespace GameOfLifeTests;

use GameOfLife\JsonParser;
use PHPUnit\Framework\TestCase;

class JsonParserTest extends TestCase
{
    /** @test */
    public function shouldReturnHorizontalBlinderGivenJsonWithHorizontalBlinker(): void
    {
        $filePath = "./test/testPatterns/Blinker1.json";
        $jsonParser = new JsonParser();
        $expectedParsedGrid = [
          [false, false, false],
          [true, true, true],
          [false, false, false]
        ];

        $rawGrid = $jsonParser->parse($filePath);

        $this->assertEquals($expectedParsedGrid, $rawGrid);
    }

    /** @test */
    public function shouldReturnVerticalBlinderGivenJsonWithVerticalBlinker(): void
    {
        $filePath = "./test/testPatterns/Blinker2.json";
        $jsonParser = new JsonParser();
        $expectedParsedGrid = [
            [false, true, false],
            [false, true, false],
            [false, true, false]
        ];

        $rawGrid = $jsonParser->parse($filePath);

        $this->assertEquals($expectedParsedGrid, $rawGrid);
    }
}
