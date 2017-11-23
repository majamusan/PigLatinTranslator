<?php namespace IanLChapman\PigLatinTranslator\Transcriber;

class PigLatinTranscriber extends BaseTranscriber
{
    private $vowelSuffixes = ['way', 'yay', 'hay', 'ay'];

    public function transcribe(&$item) : boolean
    {
        if (is_array($item)) {
            $this->transcribeArray($item);
            return true;
        }

        if (is_string($item)) {
            $this->transcribeString($item);
            return true;
        }

        return false;
    }

    public function transcribeArray(array &$tokens) : boolean
    {
        for ($i = 0; $i < count($tokens); $i++) {
            // We don't need to transcribe punctuation - just keep it in the same position
            if ($this->isPunctuation($tokens[$i])) {
                continue;
            }

            $this->transcribeString($tokens[$i]);
        }

        return true;
    }

    public function transcribeString(string &$string) : boolean
    {
        if ($this->isVowelSound($string)) {

        }
    }

    private function isPunctuation(string $string) : boolean
    {
        return (boolean)in_array($string, ['.', ',', '!', '?', '(', ')']);
    }

    private function isVowelSound(string $string) : boolean
    {
        return (boolean)in_array(substr($string, 0, 1), ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U']);
    }

    private function actionVowelTranslation(string &$string) : void {
        $string .= $this->vowelSuffixes(rand(0, count($this->vowelSuffixes)));
    }
}
