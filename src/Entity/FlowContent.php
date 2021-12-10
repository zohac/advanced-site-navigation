<?php

namespace App\Entity;

use App\Interfaces\FlowContentInterface;
use App\Repository\ContentFlowRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContentFlowRepository::class)
 */
class FlowContent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="array")
     *
     * @var FlowContentInterface[]
     */
    private array $content = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return FlowContentInterface[]
     */
    public function getContent(): array
    {
        return $this->content;
    }

    public function addContent(FlowContentInterface $content): self
    {
        $this->content[] = $content;

        return $this;
    }
}
