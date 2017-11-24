Pig Latin Translator
=============
[![Build Status](https://travis-ci.org/ianlchapman/PigLatinTranslator.svg?branch=master)](https://travis-ci.org/ianlchapman/PigLatinTranslator)
[![Latest Stable Version](https://poser.pugx.org/ianlchapman/pig-latin-translator/v/stable)](https://packagist.org/packages/ianlchapman/pig-latin-translator)
[![Total Downloads](https://poser.pugx.org/ianlchapman/pig-latin-translator/downloads)](https://packagist.org/packages/ianlchapman/pig-latin-translator)
[![Latest Unstable Version](https://poser.pugx.org/ianlchapman/pig-latin-translator/v/unstable)](https://packagist.org/packages/ianlchapman/pig-latin-translator)
[![License](https://poser.pugx.org/ianlchapman/pig-latin-translator/license)](https://packagist.org/packages/ianlchapman/pig-latin-translator)


A Pig Latin translator that converts English words and sentences in to Pig Latin written using PHP.


Features
------------
* Translates English in to Pig Latin following the rules outlined on [wikipedia](https://en.wikipedia.org/wiki/Pig_Latin#Rules)
* Handles sentences that contain the following punctuation elements: .,!?()
* Suite of unit tests

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ianlchapman/pig-latin-translator "*"
```

or add

```
"ianlchapman/pig-latin-translator": "*"
```

to the require section of your `composer.json` file.


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