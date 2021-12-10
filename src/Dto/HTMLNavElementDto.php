<?php

namespace App\Dto;

use App\Entity\FlowContent;

class HTMLNavElementDto extends HTMLElementDto
{
    public ?string $uuid;

    public ?FlowContentDto $content;
}
