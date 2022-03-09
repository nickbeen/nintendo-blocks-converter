# Nintendo Blocks Converter

[![Latest version](https://img.shields.io/packagist/v/nickbeen/nintendo-blocks-converter)](https://packagist.org/packages/nickbeen/nintendo-blocks-converter)
[![Build status](https://img.shields.io/github/workflow/status/nickbeen/nintendo-blocks-converter/Run%20tests)](https://packagist.org/packages/nickbeen/nintendo-blocks-converter)
[![Total downloads](https://img.shields.io/packagist/dt/nickbeen/nintendo-blocks-converter)](https://packagist.org/packages/nickbeen/nintendo-blocks-converter)
[![PHP Version](https://img.shields.io/packagist/php-v/nickbeen/nintendo-blocks-converter)](https://packagist.org/packages/nickbeen/nintendo-blocks-converter)
[![License](https://img.shields.io/packagist/l/nickbeen/nintendo-blocks-converter)](https://packagist.org/packages/nickbeen/nintendo-blocks-converter)

With this library you can convert Nintendo blocks to the actual filesize in Megabytes. It's also possible to convert the filesize in Megabytes to Nintendo blocks. No longer need to think twice whether you need to divide or multiply by 8, unless you've memorized 1 Nintendo block equals 1 Megabit.

Nintendo blocks are only applicable to applications for the Nintendo DS, Nintendo Wii and Nintendo 3DS consoles. 

## Requirements

* PHP >= 8.0

## Installation

Install the library into your project with Composer.

```
composer require nickbeen/nintendo-blocks-converter
```

## Usage

Initiate a `NintendoConverter` model with either a specified number of blocks or Megabytes and call the method containing the desired unit to convert to. The library throws a `UnnecessaryCalculationException` when converting blocks to blocks or Megabytes to Megabytes. Implement a try block to handle the exception in your application in the best possible way.

### Blocks to MB

Convert a specified number of blocks to a filesize in Megabytes.

```php
$blocks = new NintendoConverter(blocks: 80);

return $blocks->toMegabytes(); // returns 10
```

### MB to blocks

Convert a specified filesize in Megabytes to a number of blocks.

```php
$megabytes = new NintendoConverter(megabytes: 80);

return $megabytes->toBlocks(); // returns 640
```

## License

This library is licensed under the MIT License (MIT). See the [LICENSE](LICENSE.md) for more details.
