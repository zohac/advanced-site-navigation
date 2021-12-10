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
    private array $contents = [];

    /**
     * @return FlowContentInterface[]
     */
    public function getContents(): array
    {
        return $this->contents;
    }

    public function addContent(FlowContentInterface $content): self
    {
        if (!$this->contains($content)) {
            $this->contents[] = $content;
        }

        return $this;
    }

    public function removeContent(FlowContentInterface $content): self
    {
        $this->removeElement($content);

        return $this;
    }

    private function contains(FlowContentInterface $content): bool
    {
        return in_array($content, $this->contents, true);
    }

    private function removeElement(FlowContentInterface $content): void
    {
        $key = array_search($content, $this->contents, true);
        unset($this->contents[$key]);
    }
}
