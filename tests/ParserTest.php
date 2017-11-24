<?php namespace IanLChapman;

use IanLChapman\PigLatinTranslator\Parser;

class ParserTest extends \PHPUnit\Framework\TestCase
{
    protected $parser;

    protected function setUp()
    {
        $this->parser = new Parser;
    }

    public function testParseSingleWord()
    {
        $string = "latin";
        $expectedResult = "atinlay";
        $this->assertEquals($expectedResult, $this->parser->translate($string));
    }

    public function testParseString()
    {
        $string = "Words too stupid thanks eat ends always";
        $expectedResult = "Ordsway ootay upidstay anksthay eatway endsway alwaysway";
        $this->assertEquals($expectedResult, $this->parser->translate($string));
    }

    public function testMultipleSentence()
    {
        $string = "Words too stupid. Thanks eat ends always.";
        $expectedResult = "Ordsway ootay upidstay. Anksthay eatway endsway alwaysway.";
        $this->assertEquals($expectedResult, $this->parser->translate($string));
    }

    public function testFullFeatures()
    {
        $string = "Stupid eat words, always. Thanks (ends stupid)! Words too stupid?";
        $expectedResult = "Upidstay eatway ordsway, alwaysway. Anksthay (endsway upidstay)! Ordsway ootay upidstay?";
        $this->assertEquals($expectedResult, $this->parser->translate($string));
    }
}
