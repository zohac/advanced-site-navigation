<?php

namespace App\Service;

use App\Dto\HTMLImageElementDto;
use App\Entity\HTMLImageElement;
use App\Entity\URI;
use App\Interfaces\FlowContentInterface;

class HTMLImageElementService extends HTMLElementService implements FlowContentInterface
{
    public function convertDtoToEntity(HTMLImageElementDto $dto, ?HTMLImageElement $HTMLImageElement = null): HTMLImageElement
    {
        if (null === $HTMLImageElement) {
            $HTMLImageElement = new HTMLImageElement();
        }

        $HTMLImageElement->setSrc(new URI($dto->src));

        if (isset($dto->crossOrigin)) {
            $HTMLImageElement->setCrossOrigin($dto->crossOrigin);
        }
        if (isset($dto->decoding)) {
            $HTMLImageElement->setDecoding($dto->decoding);
        }
        if (isset($dto->loading)) {
            $HTMLImageElement->setLoading($dto->loading);
        }
        if (isset($dto->alt)) {
            $HTMLImageElement->setAlt($dto->alt);
        }
        if (isset($dto->height)) {
            $HTMLImageElement->setHeight($dto->height);
        }
        if (isset($dto->width)) {
            $HTMLImageElement->setWidth($dto->width);
        }

        $this->hydrateHTMLElementEntityWithDto($HTMLImageElement, $dto);

        return $HTMLImageElement;
    }

    public function convertEntityToDto(HTMLImageElement $HTMLImageElement, ?HTMLImageElementDto $HTMLImageElementDto = null): HTMLImageElementDto
    {
        if (null === $HTMLImageElementDto) {
            $HTMLImageElementDto = new HtmlImageElementDto();
        }
        $HTMLImageElementDto->crossOrigin = $HTMLImageElement->getCrossOrigin();
        $HTMLImageElementDto->decoding = $HTMLImageElement->getDecoding();
        $HTMLImageElementDto->loading = $HTMLImageElement->getLoading();
        $HTMLImageElementDto->alt = $HTMLImageElement->getAlt();
        $HTMLImageElementDto->height = $HTMLImageElement->getHeight();
        $HTMLImageElementDto->width = $HTMLImageElement->getWidth();
        if ($HTMLImageElement->getSrc()) {
            $HTMLImageElementDto->src = $HTMLImageElement->getSrc()->getAbsolutePath();
        }

        $this->hydrateDtoWithHTMLElementEntity($HTMLImageElementDto, $HTMLImageElement);

        return $HTMLImageElementDto;
    }
}
