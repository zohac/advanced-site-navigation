<?php

namespace App\Entity;

use App\Enum\ContentType;
use App\Interfaces\FlowContentInterface;
use App\Repository\HTMLNavElementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * @ORM\Entity(repositoryClass=HTMLNavElementRepository::class)
 * @ORM\Table(name="html_nav_element",
 *    uniqueConstraints={
 *        @ORM\UniqueConstraint(name="id_html_nav_element",
 *            columns={"id_html_nav_element", "id_html_element"})
 *    })
 */
class HTMLNavElement extends HTMLElement implements FlowContentInterface
{
    private const CONTENT_TYPE = [
        ContentType::FLOW,
        ContentType::SECTIONING,
    ];

    /**
     * @ORM\Id
     * @ORM\Column(name="id_html_nav_element", type="string")
     */
    private ?string $uuid;

    /**
     * @ORM\OneToOne(targetEntity=FlowContent::class, cascade={"persist", "remove"})
     */
    private ?FlowContent $content;

    public function __construct()
    {
        $this->uuid = Uuid::v4();
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

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
