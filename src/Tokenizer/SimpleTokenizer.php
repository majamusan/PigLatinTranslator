<?php namespace IanLChapman\PigLatinTranslator\Tokenizer;

class SimpleTokenizer extends BaseTokenizer
{
    /**
     * Converts a string to tokens
     * @param  string $string The string to convert to tokens
     * @return array          Tokens extracted from the string
     */
    public function tokenize(string $string) : array
    {
        $matches = [];
        preg_match_all("/[\w\d']+|[\.,!?\(\)]/", $string, $matches);
        return $matches[0];
    }

        /**
     * Converts an array of tokens back in to a string
     * @param  array  $tokens The tokens to be recombined
     * @return string         A completed string made up of the tokens
     */
    public function reconstruct(array $tokens) : string
    {
        $partialString = implode(" ", $tokens);
        $partialString = str_replace([' .', ' ,', ' !', ' ?', '( ', ' )'], ['.', ',', '!', '?', '(', ')'], $partialString);
        return $partialString;
    }
}
