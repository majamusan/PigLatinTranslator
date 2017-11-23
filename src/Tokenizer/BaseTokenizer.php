<?php namespace IanLChapman\PigLatinTranslator\Tokenizer;

abstract class BaseTokenizer
{
    /**
     * Converts a string to tokens
     * @param  string $string The string to convert to tokens
     * @return array          Tokens extracted from the string
     */
    abstract public function tokenize(string $string) : array;

    /**
     * Converts an array of tokens back in to a string
     * @param  array  $tokens The tokens to be recombined
     * @return string         A completed string made up of the tokens
     */
    abstract public function reconstruct(array $tokens) : string;
}
