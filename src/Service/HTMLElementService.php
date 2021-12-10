<?php

namespace App\Service;

use App\Dto\HTMLElementDto;
use App\Entity\HTMLElement;

class HTMLElementService
{
    protected function hydrateHTMLElementEntityWithDto(HTMLElement $entity, HTMLElementDto $dto): void
    {
        $properties = get_class_vars(HTMLElementDto::class);

        foreach ($properties as $property => $value) {
            if (isset($dto->$property)) {
                $method = 'set'.ucfirst($property);
                if (method_exists(HTMLElement::class, $method)) {
                    $entity->$method($dto->$property);
                }
            }
        }
    }

    protected function hydrateDtoWithHTMLElementEntity(HTMLElementDto $dto, HTMLElement $entity): void
    {
        $properties = get_class_vars(HTMLElementDto::class);

        foreach ($properties as $property => $value) {
            $method = 'get'.ucfirst($property);
            $dto->$property = $entity->$method();
        }
    }
}
