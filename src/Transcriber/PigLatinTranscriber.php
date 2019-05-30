<?php namespace IanLChapman\PigLatinTranslator\Transcriber;

class PigLatinTranscriber extends BaseTranscriber
{
    /**
     * The suffix to be appended to vowels
     * @var string
     */
    private $vowelSuffix = 'way';

    /**
     * Transcribe a string from Enlish in to Pig Latin
     * @param  string $string The string to be transcribed
     * @return string         The transcribed string
     */
    public function transcribeString(string $string) : string
    {
        if ($this->isPunctuation($string)) {
            return $string;
        }

        if ($this->isVowelSound($string)) {
            return $this->actionVowelTranslation($string);
        }

        return $this->actionConsonantTranslation($string);
    }

    /**
     * Sets the vowel suffix to the non-default verion
     * @param string $string The new vowel suffix to use
     */
    public function setVowelSuffix(string $string) : PigLatinTranscriber
    {
        $this->vowelSuffix = $string;
        return $this;
    }

    /**
     * Detects if the passed in value starts with punctuation
     * @param  string  $string The string to test
     * @return boolean         True if the string starts with punctuation
     */
    private function isPunctuation(string $string) : bool
    {
        return (boolean)in_array(substr($string, 0, 1), ['.', ',', '!', '?', '(', ')']);
    }

    /**
     * Detects if the passed string starts with a vowel
     * @param  string  $string The string to test
     * @return boolean         True if the string starts with a vowel
     */
    private function isVowelSound(string $string) : bool
    {
        return (boolean)in_array(substr($string, 0, 1), ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U']);
    }

    /**
     * Performs a translation based on a word starting with a vowel
     * @param  string $string The string to be translated
     * @return string         The translated string
     */
    private function actionVowelTranslation(string $string) : string
    {
        return $string .'-'. $this->vowelSuffix;
    }

    /**
     * Performs a translation based on a word starting with a consonant
     * @param  string $string The string to be translated
     * @return string         The translated string
     */
    private function actionConsonantTranslation(string $string) : string
    {
        $matches = [];
        if (preg_match('/^([^aeiou]*)([aeiou]*.*)$/i', $string, $matches)) {
            if (ctype_upper(substr($string, 0, 1))) {
                return ucwords(strtolower($matches[2] .'-'. $matches[1] . 'ay'));
            }
            
            return $matches[2] .'-'. strtolower($matches[1]) . 'ay';
        }
    }
}
