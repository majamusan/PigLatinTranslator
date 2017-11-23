<?php namespace IanLChapman\PigLatinTranslator\Transcriber;

abstract class BaseTranscriber
{
    abstract public function transcribe($item) : boolean;

    abstract public function transcribeArray(array $tokens) : boolean;

    abstract public function transcribeString(string $string) : boolean;
}
