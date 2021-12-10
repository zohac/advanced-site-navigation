<?php

namespace App\Entity;

use App\Enum\ContentType;
use App\Interfaces\FlowContentInterface;
use App\Repository\HTMLNavElementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HTMLNavElementRepository::class)
 * @ORM\Table(name="html_nav_element")
 */
class HTMLNavElement extends HTMLElement implements FlowContentInterface
{
    private const CONTENT_TYPE = [
        ContentType::FLOW,
        ContentType::SECTIONING,
    ];

    /**
     * @ORM\OneToOne(targetEntity=FlowContent::class, cascade={"persist", "remove"})
     */
    private ?FlowContent $content;

    /**
     * @return string[]
     */
    public function getContentType(): array
    {
        return self::CONTENT_TYPE;
    }

    public function getContent(): ?FlowContent
    {
        return $this->content;
    }

    public function setContent(?FlowContent $content): self
    {
        $this->content = $content;

        return $this;
    }
}
