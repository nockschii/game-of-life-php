<?php

namespace SampleProjectTests;

use PHPUnit\Framework\TestCase;
use SampleProject\ExampleClass;

class ExampleClassTest extends TestCase
{
    /** @test */
    public function shouldReturnSomething()
    {
        $exampleClass = new ExampleClass();

        $this->assertEquals("Hallo", $exampleClass->greet());
    }
}
