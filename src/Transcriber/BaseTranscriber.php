<?php namespace IanLChapman\PigLatinTranslator\Transcriber;

abstract class BaseTranscriber
{
    /**
     * Transcribe a string from Enlish in to Pig Latin
     * @param  string $string The string to be transcribed
     * @return string         The transcribed string
     */
    abstract public function transcribeString(string $string) : string;

    /**
     * Transcribe an item (can be of type string or array)
     * @param  string|array $item The item to be translated
     * @return string|array       The translated item (type should match the type passed in)
     */
    public function transcribe($item)
    {
        if (is_array($item)) {
            return $this->transcribeArray($item);
        }

        if (is_string($item)) {
            return $this->transcribeString($item);
        }

        return null;
    }

    /**
     * Transcribe an array by processing each word through transcribeString
     * @param  array  $tokens The array of tokens to be translated
     * @return array          The array of translated tokens
     */
    public function transcribeArray(array $tokens) : array
    {
        for ($i = 0; $i < count($tokens); $i++) {
            $tokens[$i] = $this->transcribeString($tokens[$i]);
        }

        return $tokens;
    }
}
