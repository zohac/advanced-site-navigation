<?php

namespace App\Service;

use App\Dto\HTMLElementDto;
use App\Entity\HTMLElement;
use App\Interfaces\HTMLElementServiceInterface;

class HTMLElementService
{
    protected function hydrateHTMLElementEntityWithDto($entity, $dto): void
    {
        if ($entity instanceof HTMLElement) {
            $properties = get_class_vars(HTMLElementDto::class);

            foreach ($properties as $property => $value) {
                if (isset($dto->$property)) {
                    dump($dto->$property);
                    $method = 'set' . ucfirst($property);
                    if (method_exists(HTMLElement::class, $method)) {
                        $entity->$method($dto->$property);
                    }
                }
            }
        }
    }

    protected function hydrateDtoWithHTMLElementEntity($dto, $entity): void
    {
        if ($dto instanceof HTMLElementDto) {
            $properties = get_class_vars(HTMLElementDto::class);

            foreach ($properties as $property => $value) {
                $method = 'get' . ucfirst($property);
                $dto->$property = $entity->$method();
            }
        }
    }
}
