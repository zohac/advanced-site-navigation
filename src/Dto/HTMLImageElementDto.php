<?php

namespace App\Dto;

use App\Enum\CrossOriginEnum;
use App\Enum\DecodingEnum;
use App\Enum\LoadingEnum;
use Symfony\Component\Validator\Constraints as Assert;

class HTMLImageElementDto extends HTMLElementDto
{
    public const CROSS_ORIGIN = [
        CrossOriginEnum::CROSS_ORIGIN_ANONYMOUS,
        CrossOriginEnum::CROSS_ORIGIN_USE_CREDENTIALS,
    ];

    public const DECODING = [
        DecodingEnum::DECODING_SYNC,
        DecodingEnum::DECODING_ASYNC,
        DecodingEnum::DECODING_AUTO,
    ];

    public const LOADING = [
        LoadingEnum::LOADING_EAGER,
        LoadingEnum::LOADING_LAZY,
    ];

    public ?string $alt;

    #[Assert\Choice(choices: HTMLImageElementDto::CROSS_ORIGIN, message: 'Choose a valid value.')]
    public ?string $crossOrigin;

    #[Assert\Choice(choices: HTMLImageElementDto::DECODING, message: 'Choose a valid value.')]
    public ?string $decoding;

    public ?int $height;

    public ?int $width;

    #[Assert\Choice(choices: HTMLImageElementDto::LOADING, message: 'Choose a valid value.')]
    public ?string $loading;

    #[Assert\NotNull]
    public string $src;
}
