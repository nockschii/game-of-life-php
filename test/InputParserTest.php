<?php

namespace GameOfLifeTests;

use GameOfLife\InputParser;
use PHPUnit\Framework\TestCase;

class InputParserTest extends TestCase
{
    private InputParser $inputParser;

    protected function setUp(): void
    {
        $this->inputParser = new InputParser();
    }

    /** @test */
    public function shouldParseHorizontalBlinkerGivenAHorizontalBlinkerTestFile()
    {
        $filePath = "../test/testPatterns/Blinker1.input";
        $expectedParsedGrid = [
          [false, false, false],
          [true, true, true],
          [false, false, false]
        ];

        $parsedRawGrid = $this->inputParser->parse($filePath);

        $this->assertEquals($expectedParsedGrid, $parsedRawGrid);
    }

    /** @test */
    public function shouldParseVerticalBlinkerGivenAVerticalBlinkerTestFile()
    {
        $filePath = "../test/testPatterns/Blinker2.input";
        $expectedParsedGrid = [
            [false, true, false],
            [false, true, false],
            [false, true, false]
        ];

        $parsedRawGrid = $this->inputParser->parse($filePath);

        $this->assertEquals($expectedParsedGrid, $parsedRawGrid);
    }

//    /** @test */
//    public function shouldParseHorizontalBlinkerGivenABlinkerTestFile()
//    {
//        $filePath = "/testPatterns/Blinker2.json";
//        $gridParser = new GridParser();
//        $expectedParsedGrid = [
//            [false, false, false],
//            [true, true, true],
//            [false, false, false]
//        ];
//
//        $parsedRawGrid = $gridParser->parse($filePath);
//
//        $this->assertEquals($expectedParsedGrid, $parsedRawGrid);
//    }
}
