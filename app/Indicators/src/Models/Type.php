<?php

declare(strict_types=1);

namespace App\Indicators\Models;

enum Type: string
{
    case number = 'number';
    case letters = 'letters';
    case numbersAndLetters = 'numbers_and_letters';
    case guid = 'guid';
}
