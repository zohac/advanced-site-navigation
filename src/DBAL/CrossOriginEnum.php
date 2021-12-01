<?php

namespace App\DBAL;

use App\Interfaces\EnumInterface;

class CrossOriginEnum implements EnumInterface
{
    public const CROSS_ORIGIN_ANONYMOUS = 'anonymous';
    public const CROSS_ORIGIN_USE_CREDENTIALS = 'use-credentials';

    protected static string $name = 'CrossOriginEnum';
    protected static array $values = [
        CrossOriginEnum::CROSS_ORIGIN_ANONYMOUS,
        CrossOriginEnum::CROSS_ORIGIN_USE_CREDENTIALS,
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
