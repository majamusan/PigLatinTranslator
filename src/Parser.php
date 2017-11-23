<?php namespace IanLChapman\PigLatinTranslator;

use IanLChapman\PigLatinTranslator\Tokenizer\SimpleTokenizer;
use IanLChapman\PigLatinTranslator\Tokenizer\BaseTokenizer;

class Parser extends BaseParser
{
    protected $tokenizer = null;

    public function __construct()
    {
        $this->tokenizer = new SimpleTokenizer;
    }

    /**
     * Translates a string from English in to Pig Latin
     * @param  string $string The string to be translated
     * @return string         The result of the translation
     */
    public function translate(string $string) : string
    {
        $tokens = $this->tokenizer->tokenize($string);
        $result = $this->tokenizer->reconstruct($tokens);
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
}
