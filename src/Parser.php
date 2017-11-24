<?php namespace IanLChapman\PigLatinTranslator;

use IanLChapman\PigLatinTranslator\Tokenizer\SimpleTokenizer;
use IanLChapman\PigLatinTranslator\Tokenizer\BaseTokenizer;
use IanLChapman\PigLatinTranslator\Transcriber\PigLatinTranscriber;
use IanLChapman\PigLatinTranslator\Transcriber\BaseTranscriber;

class Parser extends BaseParser
{
    /**
     * The tokenizer being used by the parser
     * @var IanLChapman\PigLatinTranslator\Tokenizer\BaseTokenizer
     */
    protected $tokenizer = null;

    /**
     * The transcriber being used by the parser
     * @var IanLChapman\PigLatinTranslator\Transcriber\BaseTranscriber
     */
    protected $transcriber = null;

    public function __construct()
    {
        $this->tokenizer = new SimpleTokenizer;
        $this->transcriber = new PigLatinTranscriber;
    }

    /**
     * Translates a string from English in to Pig Latin
     * @param  string $string The string to be translated
     * @return string         The result of the translation
     */
    public function translate(string $string) : string
    {
        $tokens = $this->tokenizer->tokenize($string);
        $tokens = $this->transcriber->transcribe($tokens);
        return $this->tokenizer->reconstruct($tokens);
    }

    /**
     * Sets the tokenizer to be used by the parser
     * @param BaseTokenizer $tokenizer A tokenizer that supports the BaseTokenizer interface
     */
    public function setTokenizer(BaseTokenizer $tokenizer) : Parser
    {
        $this->tokenizer = $tokenizer;
        return $this;
    }

    /**
     * Gets the tokenizer being used by the parser
     * @return BaseTokenizer The tokenizer being used by the parser
     */
    public function getTokenizer() : BaseTokenizer
    {
        return $this->tokenizer;
    }

    /**
     * Sets the transcriber to be used by the parser
     * @param BaseTranscriber $transcriber A transcriber that supports the BaseTranscriber interface
     */
    public function setTranscriber(BaseTranscriber $transcriber) : Parser
    {
        $this->transcriber = $transcriber;
        return $this;
    }

    /**
     * Gets the transcriber being used by the parser
     * @return BaseTranscriber The transcriber being used by the parser
     */
    public function getTranscriber() : BaseTranscriber
    {
        return $this->transcriber;
    }
}
