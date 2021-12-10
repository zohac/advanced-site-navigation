<?php

namespace App\Interfaces;

use App\Dto\HTMLElementDto;
use App\Entity\HTMLElement;

interface HTMLElementServiceInterface
{
    public function hydrateHTMLElementEntityWithDto(HTMLElement $entity, HTMLElementDto $dto): void;
}
