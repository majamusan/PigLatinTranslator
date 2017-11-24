<?php namespace IanLChapman;

use IanLChapman\PigLatinTranslator\Transcriber\PigLatinTranscriber;

class PigLatinTranscriberTest extends \PHPUnit\Framework\TestCase
{
    protected $transcriber;

    protected function setUp()
    {
        $this->transcriber = new PigLatinTranscriber;
    }

    public function testTranscribeSingleConsonantWord()
    {
        $string = "latin";
        $expectedResult = "atinlay";
        $this->assertEquals($expectedResult, $this->transcriber->transcribeString($string));
    }

    public function testTranscribeMultiConsonantWord()
    {
        $string = "cheers";
        $expectedResult = "eerschay";
        $this->assertEquals($expectedResult, $this->transcriber->transcribeString($string));
    }

    public function testTranscribeVowelWord()
    {
        $string = "eat";
        $expectedResult = "eatway";
        $this->assertEquals($expectedResult, $this->transcriber->transcribeString($string));
    }

    public function testTranscribeArray()
    {
        $tokens = ["words", "too", "stupid", "thanks", "eat", "ends", "always"];
        $expectedResult = ["ordsway", "ootay", "upidstay", "anksthay", "eatway", "endsway", "alwaysway"];
        $this->assertEquals($expectedResult, $this->transcriber->transcribeArray($tokens));
    }

    public function testTranscribeAutoDetectString()
    {
        $string = "omelet";
        $expectedResult = "omeletway";
        $this->assertEquals($expectedResult, $this->transcriber->transcribe($string));
    }

    public function testTranscribeAutoDetectArray()
    {
        $tokens = ["words", "too", "stupid", "thanks", "eat", "ends", "always"];
        $expectedResult = ["ordsway", "ootay", "upidstay", "anksthay", "eatway", "endsway", "alwaysway"];
        $this->assertEquals($expectedResult, $this->transcriber->transcribe($tokens));
    }

    public function testPunctuation()
    {
        $string = "?";
        $expectedResult = "?";
        $this->assertEquals($expectedResult, $this->transcriber->transcribe($string));
    }

    public function testChangeVowelSuffix()
    {
        $string = "eat";
        $expectedResult = "eatyay";
        $this->transcriber->setVowelSuffix('yay');
        $this->assertEquals($expectedResult, $this->transcriber->transcribe($string));
        $this->transcriber->setVowelSuffix('way');
    }

    public function testCapitalization()
    {
        $tokens = ["Words", "too", "stupid", "thanks", "eat", "Ends", "always"];
        $expectedResult = ["Ordsway", "ootay", "upidstay", "anksthay", "eatway", "Endsway", "alwaysway"];
        $this->assertEquals($expectedResult, $this->transcriber->transcribe($tokens));
    }
}
