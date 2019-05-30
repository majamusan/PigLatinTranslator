Hyphenated Pig Latin Translator
=============


A hyphenated version of [ianlchapman's PigLatinTranslator](https://github.com/ianlchapman/PigLatinTranslator), note phpunit tests not updated 

Installation
-----

```
"majamusan/pig-latin-translator": "dev-master",
```

add above to the require section of your `composer.json` file.


Usage
-----

Translate a single word
```php
use IanLChapman\PigLatinTranslator\Parser;

$translator = new Parser();
$translation = $translator->translate('String');
```

Translate a sentence
```php
use IanLChapman\PigLatinTranslator\Parser;

$translator = new Parser();
$translation = $translator->translate('Sentence to be translated.');
```
