<?php

namespace App\Entity;

use App\Repository\SrcSetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SrcSetRepository::class)
 */
class SrcSet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $w;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $x;

    /**
     * @ORM\OneToOne(targetEntity=URI::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private URI $url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getW(): ?int
    {
        return $this->w;
    }

    public function setW(?int $w): self
    {
        $this->w = $w;

        return $this;
    }

    public function getX(): ?int
    {
        return $this->x;
    }

    public function setX(?int $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getUrl(): ?URI
    {
        return $this->url;
    }

    public function setUrl(URI $url): self
    {
        $this->url = $url;

        return $this;
    }
}
