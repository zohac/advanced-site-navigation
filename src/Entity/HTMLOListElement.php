<?php

namespace App\Entity;

use App\DBAL\OListEnum;
use App\Interfaces\FlowContentInterface;
use App\Repository\HTMLOListElementRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @UniqueEntity("uuid")
 * @ORM\Entity(repositoryClass=HTMLOListElementRepository::class)
 * @ORM\Table(name="html_olist_element",
 *    uniqueConstraints={
 *        @ORM\UniqueConstraint(name="id_html_olist_element",
 *            columns={"id_html_olist_element"})
 *    })
 */
class HTMLOListElement extends HTMLElement implements FlowContentInterface
{
    /**
     * @ORM\GeneratedValue("UUID")
     * @ORM\Column(name="id_html_olist_element", type="string")
     */
    private $uuid;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $reversed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $start;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private string $type = OListEnum::TYPE_NUMERAL;

    /**
     * @ORM\ManyToOne(targetEntity=HTMLNavElement::class, inversedBy="content")
     * @ORM\JoinColumn(name="id_html_nav_element", referencedColumnName="id_html_nav_element")
     */
    private $parent;

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }


    public function getReversed(): ?bool
    {
        return $this->reversed;
    }

    public function setReversed(?bool $reversed): self
    {
        $this->reversed = $reversed;

        return $this;
    }

    public function getStart(): ?int
    {
        return $this->start;
    }

    public function setStart(?int $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        if (!in_array($type, OListEnum::getValues(), true)) {
            throw new \InvalidArgumentException("Invalid status");
        }
        $this->type = $type;

        return $this;
    }

    public function getParent(): ?HTMLNavElement
    {
        return $this->parent;
    }

    public function setParent(?HTMLNavElement $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}
