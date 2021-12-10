<?php

namespace App\Entity;

use App\Enum\ContentType;
use App\Enum\OListEnum;
use App\Interfaces\FlowContentInterface;
use App\Repository\HTMLOListElementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @UniqueEntity("uuid")
 * @ORM\Entity(repositoryClass=HTMLOListElementRepository::class)
 * @ORM\Table(name="html_olist_element")
 */
class HTMLOListElement extends HTMLElement implements FlowContentInterface
{
    private const CONTENT_TYPE = [
        ContentType::FLOW,
    ];

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
     * @ORM\OneToMany(
     *     targetEntity=HTMLLiElement::class,
     *     mappedBy="parent",
     *     cascade={"persist", "remove"}
     * )
     *
     * @var Collection|HTMLLiElement[]
     */
    private Collection $HTMLLiElement;

    public function __construct()
    {
        $this->HTMLLiElement = new ArrayCollection();
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
            throw new \InvalidArgumentException('Invalid status');
        }
        $this->type = $type;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getContentType(): array
    {
        return self::CONTENT_TYPE;
    }

    /**
     * @return Collection|HTMLLiElement[]
     */
    public function getHTMLLiElement(): Collection
    {
        return $this->HTMLLiElement;
    }

    public function addHTMLLiElement(HTMLLiElement $HTMLLiElement): self
    {
        if (!$this->HTMLLiElement->contains($HTMLLiElement)) {
            $this->HTMLLiElement[] = $HTMLLiElement;
            $HTMLLiElement->setParent($this);
        }

        return $this;
    }

    public function removeHTMLLiElement(HTMLLiElement $HTMLLiElement): self
    {
        if ($this->HTMLLiElement->removeElement($HTMLLiElement)) {
            // set the owning side to null (unless already changed)
            if ($HTMLLiElement->getParent() === $this) {
                $HTMLLiElement->setParent(null);
            }
        }

        return $this;
    }
}
