<?php

namespace App\Dto;

use App\Enum\AutoCapitalizeEnum;
use App\Enum\DirEnum;
use App\Enum\DropzoneEnum;
use Symfony\Component\Validator\Constraints as Assert;

class HTMLElementDto
{
    public const AUTO_CAPITALIZE = [
        AutoCapitalizeEnum::AUTO_CAPITALIZE_OFF,
        AutoCapitalizeEnum::AUTO_CAPITALIZE_ON,
        AutoCapitalizeEnum::AUTO_CAPITALIZE_WORDS,
        AutoCapitalizeEnum::AUTO_CAPITALIZE_CHARACTERS,
    ];

    public const DIR = [
        DirEnum::DIR_LTR,
        DirEnum::DIR_RTL,
        DirEnum::DIR_AUTO,
    ];

    public const DROPZONE = [
        DropzoneEnum::DROPZONE_COPY,
        DropzoneEnum::DROPZONE_MOVE,
        DropzoneEnum::DROPZONE_LINK,
    ];

    public ?int $id;

    public ?string $accessKey;

    #[Assert\Choice(choices: HTMLElementDto::AUTO_CAPITALIZE, message: 'Choose a valid value.')]
    public ?string $autoCapitalize = null;

    public ?string $class;

    public ?bool $contentEditable;

    #[Assert\Choice(choices: HTMLElementDto::DIR, message: 'Choose a valid value.')]
    public ?string $dir = null;

    public ?bool $draggable;

    #[Assert\Choice(choices: HTMLElementDto::DROPZONE, message: 'Choose a valid value.')]
    public ?string $dropzone = null;

    public ?bool $hidden;

    /**
     * @var string[]|null
     */
    public ?array $data;

    public ?string $uid;

    public ?string $itemId;

    public ?string $itemProp;

    public ?string $itemRef;

    public ?string $itemScope;

    public ?string $itemType;

    public ?string $lang;

    public ?string $style;

    public ?int $tabIndex;

    public ?string $title;
}
