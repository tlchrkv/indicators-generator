<?php

declare(strict_types=1);

namespace App\Indicators\Models\StringGenerator;

use function config;

final class StringGenerator
{
    private const
        SYMBOLS_COLLECTION = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        NUMBERS_COLLECTION = '0123456789';

    public static function letters(): string
    {
        return self::generate(self::SYMBOLS_COLLECTION);
    }

    public static function lettersAndNumbers(): string
    {
        return self::generate(self::NUMBERS_COLLECTION . self::SYMBOLS_COLLECTION);
    }

    private static function generate(string $input): string
    {
        $inputLength = strlen($input);
        $randomString = '';

        for ($i = 0; $i < config('string_generator.result_length'); $i++) {
            $randomCharacter = $input[rand(0, $inputLength - 1)];
            $randomString .= $randomCharacter;
        }

        return $randomString;
    }
}
