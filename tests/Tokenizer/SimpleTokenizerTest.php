<?php namespace IanLChapman;

use IanLChapman\PigLatinTranslator\Tokenizer\SimpleTokenizer;

class SimpleTokenizerTest extends \PHPUnit\Framework\TestCase
{
    protected $tokenizer;

    protected function setUp()
    {
        $this->tokenizer = new SimpleTokenizer;
    }

    public function testTokenizeSpaces()
    {
        $string = "The quick brown fox jumps over the lazy dog";
        $expectedResult = ["The", "quick", "brown", "fox", "jumps", "over", "the", "lazy", "dog"];
        $this->assertEquals($expectedResult, $this->tokenizer->tokenize($string));
    }

    public function testTokenizePeriod()
    {
        $string = "Sentence one. Sentence two.";
        $expectedResult = ["Sentence", "one", ".", "Sentence", "two", "."];
        $this->assertEquals($expectedResult, $this->tokenizer->tokenize($string));
    }

    public function testTokenizeComma()
    {
        $string = "Sentence one, part two";
        $expectedResult = ["Sentence", "one", ",", "part", "two"];
        $this->assertEquals($expectedResult, $this->tokenizer->tokenize($string));
    }

    public function testTokenizeQuestionMark()
    {
        $string = "Sentence one is a question?";
        $expectedResult = ["Sentence", "one", "is", "a", "question", "?"];
        $this->assertEquals($expectedResult, $this->tokenizer->tokenize($string));
    }

    public function testTokenizeExplanationMark()
    {
        $string = "Sentence one is an exclamation!";
        $expectedResult = ["Sentence", "one", "is", "an", "exclamation", "!"];
        $this->assertEquals($expectedResult, $this->tokenizer->tokenize($string));
    }

    public function testTokenizeBrackets()
    {
        $string = "Sentence one (Sentence two)";
        $expectedResult = ["Sentence", "one", "(", "Sentence", "two", ")"];
        $this->assertEquals($expectedResult, $this->tokenizer->tokenize($string));
    }

    public function testTokenizeCombination()
    {
        $string = "I saw a mouse. Where? (worried) There on the stair. Where on the stair? Right there! A little mouse with clogs on, well I declare.";
        $expectedResult = ["I", "saw", "a", "mouse", ".", "Where", "?", "(", "worried", ")", "There", "on", "the", "stair", ".", "Where", "on", "the", "stair", "?", "Right", "there", "!", "A", "little", "mouse", "with", "clogs", "on", ",", "well", "I", "declare", "."];
        $this->assertEquals($expectedResult, $this->tokenizer->tokenize($string));
    }

    public function testReconstructSpaces()
    {
        $expectedResult = "The quick brown fox jumps over the lazy dog";
        $tokens = ["The", "quick", "brown", "fox", "jumps", "over", "the", "lazy", "dog"];
        $this->assertEquals($expectedResult, $this->tokenizer->reconstruct($tokens));
    }

    public function testReconstructPeriod()
    {
        $expectedResult = "Sentence one. Sentence two.";
        $tokens = ["Sentence", "one", ".", "Sentence", "two", "."];
        $this->assertEquals($expectedResult, $this->tokenizer->reconstruct($tokens));
    }

    public function testReconstructComma()
    {
        $expectedResult = "Sentence one, part two";
        $tokens = ["Sentence", "one", ",", "part", "two"];
        $this->assertEquals($expectedResult, $this->tokenizer->reconstruct($tokens));
    }

    public function testReconstructQuestionMark()
    {
        $expectedResult = "Sentence one is a question?";
        $tokens = ["Sentence", "one", "is", "a", "question", "?"];
        $this->assertEquals($expectedResult, $this->tokenizer->reconstruct($tokens));
    }

    public function testReconstructExplanationMark()
    {
        $expectedResult = "Sentence one is an exclamation!";
        $tokens = ["Sentence", "one", "is", "an", "exclamation", "!"];
        $this->assertEquals($expectedResult, $this->tokenizer->reconstruct($tokens));
    }

    public function testReconstructBrackets()
    {
        $expectedResult = "Sentence one (Sentence two)";
        $tokens = ["Sentence", "one", "(", "Sentence", "two", ")"];
        $this->assertEquals($expectedResult, $this->tokenizer->reconstruct($tokens));
    }

    public function testReconstructCombination()
    {
        $expectedResult = "I saw a mouse. Where? (worried) There on the stair. Where on the stair? Right there! A little mouse with clogs on, well I declare.";
        $tokens = ["I", "saw", "a", "mouse", ".", "Where", "?", "(", "worried", ")", "There", "on", "the", "stair", ".", "Where", "on", "the", "stair", "?", "Right", "there", "!", "A", "little", "mouse", "with", "clogs", "on", ",", "well", "I", "declare", "."];
        $this->assertEquals($expectedResult, $this->tokenizer->reconstruct($tokens));
    }
}
