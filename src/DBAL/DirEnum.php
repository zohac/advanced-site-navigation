<?php

namespace App\DBAL;

use App\Interfaces\EnumInterface;

class DirEnum implements EnumInterface
{
    public const DIR_LTR = 'ltr';
    public const DIR_RTL = 'rtl';
    public const DIR_AUTO = 'auto';

    protected static string $name = 'DirEnum';
    protected static array $values = [
        DirEnum::DIR_LTR,
        DirEnum::DIR_RTL,
        DirEnum::DIR_AUTO,
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
