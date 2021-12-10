<?php

namespace App\Enum;

use App\Interfaces\EnumInterface;

class OListEnum implements EnumInterface
{
    public const TYPE_LOWERCASE_LETTER = 'a';
    public const TYPE_UPPERCASE_LETTER = 'A';
    public const TYPE_LOWERCASE_ROMAN_NUMERAL = 'i';
    public const TYPE_UPPERCASE_ROMAN_NUMERAL = 'I';
    public const TYPE_NUMERAL = '1';

    protected static string $name = 'OListEnum';
    protected static array $values = [
        OListEnum::TYPE_LOWERCASE_LETTER,
        OListEnum::TYPE_UPPERCASE_LETTER,
        OListEnum::TYPE_LOWERCASE_ROMAN_NUMERAL,
        OListEnum::TYPE_UPPERCASE_ROMAN_NUMERAL,
        OListEnum::TYPE_NUMERAL,
    ];

    public static function getName(): string
    {
        return self::$name;
    }

    public static function getValues(): array
    {
        return self::$values;
    }
}
