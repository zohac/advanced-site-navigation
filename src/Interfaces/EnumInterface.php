<?php

namespace App\Interfaces;

interface EnumInterface
{
    public static function getName(): string;

    public static function getValues(): array;
}
