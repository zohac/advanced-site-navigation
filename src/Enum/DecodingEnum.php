<?php

namespace App\Enum;

use App\Interfaces\EnumInterface;

class DecodingEnum implements EnumInterface
{
    public const DECODING_SYNC = 'sync';
    public const DECODING_ASYNC = 'async';
    public const DECODING_AUTO = 'auto';

    protected static string $name = 'DecodingEnum';
    protected static array $values = [
        DecodingEnum::DECODING_SYNC,
        DecodingEnum::DECODING_ASYNC,
        DecodingEnum::DECODING_AUTO,
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
