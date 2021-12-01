<?php

namespace App\DBAL;

use App\Interfaces\EnumInterface;

class LoadingEnum implements EnumInterface
{
    public const LOADING_EAGER = 'eager';
    public const LOADING_LAZY = 'lazy';

    protected static string $name = 'LoadingEnum';
    protected static array $values = [
        LoadingEnum::LOADING_EAGER,
        LoadingEnum::LOADING_LAZY,
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
