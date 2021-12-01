<?php

namespace App\DBAL;

use App\Interfaces\EnumInterface;

class DropzoneEnum implements EnumInterface
{
    public const DROPZONE_COPY = 'copy';
    public const DROPZONE_MOVE = 'move';
    public const DROPZONE_LINK = 'link';

    protected static string $name = 'DropzoneEnum';
    protected static array $values = [
        DropzoneEnum::DROPZONE_COPY,
        DropzoneEnum::DROPZONE_MOVE,
        DropzoneEnum::DROPZONE_LINK,
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
