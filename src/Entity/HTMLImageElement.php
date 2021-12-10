<?php

namespace App\Entity;

use App\Enum\ContentType;
use App\Enum\CrossOriginEnum;
use App\Enum\DecodingEnum;
use App\Enum\LoadingEnum;
use App\Interfaces\FlowContentInterface;
use App\Repository\HTMLImageElementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HTMLImageElementRepository::class)
 * @ORM\Table(name="html_image_element")
 */
class HTMLImageElement extends HTMLElement implements FlowContentInterface
{
    private const CONTENT_TYPE = [
        ContentType::FLOW,
        ContentType::PHRASING,
        ContentType::EMBEDDED,
        ContentType::INTERACTIVE,
    ];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $alt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $crossOrigin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $decoding;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $height;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $width;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $loading;

    /**
     * @ORM\OneToOne(targetEntity=URI::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private URI $src;

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getCrossOrigin(): ?string
    {
        return $this->crossOrigin;
    }

    public function setCrossOrigin(string $crossOrigin): self
    {
        if (!in_array($crossOrigin, CrossOriginEnum::getValues(), true)) {
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->crossOrigin = $crossOrigin;

        return $this;
    }

    public function getDecoding(): ?string
    {
        return $this->decoding;
    }

    public function setDecoding(string $decoding): self
    {
        if (!in_array($decoding, DecodingEnum::getValues(), true)) {
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->decoding = $decoding;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getLoading(): ?string
    {
        return $this->loading;
    }

    public function setLoading(string $loading): self
    {
        if (!in_array($loading, LoadingEnum::getValues(), true)) {
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->loading = $loading;

        return $this;
    }

    public function getSrc(): ?URI
    {
        return $this->src;
    }

    public function setSrc(URI $src): self
    {
        $this->src = $src;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getContentType(): array
    {
        return self::CONTENT_TYPE;
    }
}
