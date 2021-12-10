<?php

namespace App\Entity;

use App\Repository\HTMLLiElementRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

/**
 * @ORM\Entity(repositoryClass=HTMLLiElementRepository::class)
 * @ORM\Table(name="html_li_element",
 *    uniqueConstraints={
 *        @ORM\UniqueConstraint(name="id_html_li_element",
 *            columns={"id_html_li_element", "id_html_element"})
 *    })
 */
class HTMLLiElement extends HTMLElement
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id_html_li_element", type="string")
     */
    private string $uuid;

    /**
     * @ORM\Column(type="integer")
     */
    private int $value;

    /**
     * @ORM\OneToOne(targetEntity=FlowContent::class, cascade={"persist", "remove"})
     */
    private ?FlowContent $content;

    /**
     * @ORM\ManyToOne(targetEntity=HTMLOListElement::class, inversedBy="HTMLLiElement")
     * @ORM\JoinColumns(
     *      @ORM\JoinColumn(name="uuid", referencedColumnName="id_html_olist_element"),
     *      @ORM\JoinColumn(name="id", referencedColumnName="id_html_element"),
     * )
     */
    private $parent;

    public function __construct()
    {
        $this->uuid = Uuid::v4();
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

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
