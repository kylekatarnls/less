# less
[![Latest Stable Version](https://poser.pugx.org/nodejs-php-fallback/less/v/stable.png)](https://packagist.org/packages/nodejs-php-fallback/less)
[![Build Status](https://travis-ci.org/kylekatarnls/less.svg?branch=master)](https://travis-ci.org/kylekatarnls/less)
[![StyleCI](https://styleci.io/repos/64429930/shield?style=flat)](https://styleci.io/repos/64429930)
[![Test Coverage](https://codeclimate.com/github/kylekatarnls/less/badges/coverage.svg)](https://codecov.io/github/kylekatarnls/less?branch=master)
[![Code Climate](https://codeclimate.com/github/kylekatarnls/less/badges/gpa.svg)](https://codeclimate.com/github/kylekatarnls/less)

PHP wrapper to execute less node package or fallback to a PHP alternative.

## Usage

First you need [composer](https://getcomposer.org/) if you have not already. Then get the package with ```composer require nodejs-php-fallback/less``` then require the composer autload in your PHP file if it's not already:
```php
<?php

use NodejsPhpFallback\less;

// Require the composer autload in your PHP file if it's not already.
// You do not need to if you use a framework with composer like Symfony, Laravel, etc.
require 'vendor/autoload.php';

$less = new less('path/to/my-less-file.less');

// Output to a file:
$less->write('path/to/my-css-file.css');

// Get CSS contents:
$cssContents = $less->getCss();

// Output to the browser:
header('Content-type: text/css');
echo $less->getCss();

// You can also get less code from a string:
$less = new less('
a
  color blue
  &:hover
    color navy
');
// Then write CSS with:
$less->write('path/to/my-css-file.css');
// or get it with:
$cssContents = $less->getCss();

// Pass true to the less constructor to minify the rendered CSS:
$less = new less('path/to/my-less-file.styl', true);
```
