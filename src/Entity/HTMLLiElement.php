<?php

namespace App\Entity;

use App\Repository\HTMLLiElementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HTMLLiElementRepository::class)
 * @ORM\Table(name="html_li_element")
 */
class HTMLLiElement extends HTMLElement
{
    /**
     * @ORM\Column(type="integer", nullable="true")
     */
    private int $value;

    /**
     * @ORM\OneToOne(targetEntity=FlowContent::class, cascade={"persist", "remove"})
     */
    private ?FlowContent $content;

    /**
     * @ORM\ManyToOne(
     *     targetEntity=HTMLOListElement::class,
     *     inversedBy="HTMLLiElement",
     *     cascade={"persist", "remove"}
     * )
     */
    private $parent;

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
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

    public function getParent(): ?HTMLOListElement
    {
        return $this->parent;
    }

    public function setParent(?HTMLOListElement $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}
