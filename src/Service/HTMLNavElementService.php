<?php

namespace App\Service;

use App\Dto\HTMLNavElementDto;
use App\Entity\FlowContent;
use App\Entity\HTMLNavElement;

class HTMLNavElementService extends HTMLElementService
{
    private HTMLOListElementService $HTMLOListElementService;

    public function __construct(HTMLOListElementService $HTMLOListElementService)
    {
        $this->HTMLOListElementService = $HTMLOListElementService;
    }

    public function convertDtoToEntity(HTMLNavElementDto $dto, ?HTMLNavElement $HTMLNavElement = null): HTMLNavElement
    {
        if (null === $HTMLNavElement) {
            $HTMLNavElement = new HTMLNavElement();
        }

        if (!isset($dto->content)) {
            $flowContent = new FlowContent();
            $flowContent->addContent($this->HTMLOListElementService->getNewHTMLOListElement());
            $HTMLNavElement->setContent($flowContent);
        }

        $this->hydrateHTMLElementEntityWithDto($HTMLNavElement, $dto);

        return $HTMLNavElement;
    }
}
