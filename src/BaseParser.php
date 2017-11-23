<?php namespace IanLChapman\PigLatinTranslator;

use IanLChapman\PigLatinTranslator\Tokenizer\BaseTokenizer;

abstract class BaseParser
{
    /**
     * Translates a string from English in to Pig Latin
     * @param  string $string The string to be translated
     * @return string         The result of the translation
     */
    abstract public function translate(string $string) : string;

    /**
     * Sets the tokenizer to be used by the parser
     * @param BaseTokenizer $tokenizer A tokenizer that supports the BaseTokenizer interface
     */
    abstract public function setTokenizer(BaseTokenizer $tokenizer) : Parser;

    /**
     * Gets the tokenizer being used by the parser
     * @return BaseTokenizer The tokenizer being used by the parser
     */
    abstract public function getTokenizer() : BaseTokenizer;
}
