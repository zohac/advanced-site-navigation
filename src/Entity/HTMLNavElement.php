<?php

namespace App\Entity;

use App\Repository\HTMLNavElementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HTMLNavElementRepository::class)
 * @ORM\Table(name="html_nav_element",
 *    uniqueConstraints={
 *        @ORM\UniqueConstraint(name="id_html_nav_element",
 *            columns={"id_html_nav_element"})
 *    })
 */
class HTMLNavElement extends HTMLElement
{
    /**
     * @ORM\GeneratedValue("UUID")
     * @ORM\Column(name="id_html_nav_element", type="string")
     */
    private $uuid;

    /**
     * @ORM\OneToMany(targetEntity=HTMLOListElement::class, mappedBy="parent")
     */
    private $content;

    public function __construct()
    {
        $this->content = new ArrayCollection();
    }

    /**
     * @return Collection|HTMLOListElement[]
     */
    public function getContent(): Collection
    {
        return $this->content;
    }

    public function addContent(HTMLOListElement $content): self
    {
        if (!$this->content->contains($content)) {
            $this->content[] = $content;
            $content->setParent($this);
        }

        return $this;
    }

    public function removeContent(HTMLOListElement $content): self
    {
        if ($this->content->removeElement($content)) {
            // set the owning side to null (unless already changed)
            if ($content->getParent() === $this) {
                $content->setParent(null);
            }
        }

        return $this;
    }
}
