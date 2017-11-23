<?php namespace IanLChapman;

use IanLChapman\PigLatinTranslator\Parser;

class ParserTest extends \PHPUnit\Framework\TestCase
{
    protected $parser;

    protected function setUp()
    {
        $this->parser = new Parser;
    }

    public function testBase()
    {
        $this->assertTrue(true);
    }
}
