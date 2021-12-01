<?php

namespace App\DBAL;

use App\Interfaces\EnumInterface;

class AutoCapitalizeEnum implements EnumInterface
{
    public const AUTO_CAPITALIZE_OFF = 'off';
    public const AUTO_CAPITALIZE_ON = 'on';
    public const AUTO_CAPITALIZE_WORDS = 'words';
    public const AUTO_CAPITALIZE_CHARACTERS = 'characters';

    protected static string $name = 'AutoCapitalizeEnum';
    protected static array $values = [
      AutoCapitalizeEnum::AUTO_CAPITALIZE_OFF,
      AutoCapitalizeEnum::AUTO_CAPITALIZE_ON,
      AutoCapitalizeEnum::AUTO_CAPITALIZE_WORDS,
      AutoCapitalizeEnum::AUTO_CAPITALIZE_CHARACTERS,
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
