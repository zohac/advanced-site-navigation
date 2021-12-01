<?php

namespace App\Entity;

use App\DBAL\AutoCapitalizeEnum;
use App\DBAL\DirEnum;
use App\DBAL\DropzoneEnum;
use App\Repository\HTMLElementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HTMLElementRepository::class)
 * @ORM\Table(name="html_element")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 */
abstract class HTMLElement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_html_element", type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $accessKey;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private ?string $autoCapitalize;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $class;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $contentEditable;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     */
    private ?string $dir;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $draggable;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     */
    private ?string $dropzone;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private ?bool $hidden;

    /**
     * @ORM\Column(type="array")
     */
    private array $data = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $uid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $itemId;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $itemProp;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $itemRef;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $itemScope;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $itemType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $lang;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $style;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $tabIndex;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $title;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccessKey(): ?string
    {
        return $this->accessKey;
    }

    public function setAccessKey(?string $accessKey): self
    {
        $this->accessKey = $accessKey;

        return $this;
    }

    public function getAutoCapitalize(): ?string
    {
        return $this->autoCapitalize;
    }

    public function setAutoCapitalize(string $autoCapitalize): self
    {
        if (!in_array($autoCapitalize, AutoCapitalizeEnum::getValues(), true)) {
            throw new \InvalidArgumentException("Invalid status");
        }
        $this->autoCapitalize = $autoCapitalize;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(?string $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getContentEditable(): ?bool
    {
        return $this->contentEditable;
    }

    public function setContentEditable(?bool $contentEditable): self
    {
        $this->contentEditable = $contentEditable;

        return $this;
    }

    public function getDir(): ?string
    {
        return $this->dir;
    }

    public function setDir(string $dir): self
    {
        if (!in_array($dir, DirEnum::getValues(), true)) {
            throw new \InvalidArgumentException("Invalid status");
        }
        $this->dir = $dir;

        return $this;
    }

    public function getDraggable(): ?bool
    {
        return $this->draggable;
    }

    public function setDraggable(?bool $draggable): self
    {
        $this->draggable = $draggable;

        return $this;
    }

    public function getDropzone(): ?string
    {
        return $this->dropzone;
    }

    public function setDropzone(string $dropzone): self
    {
        if (!in_array($dropzone, DropzoneEnum::getValues(), true)) {
            throw new \InvalidArgumentException("Invalid status");
        }
        $this->dropzone = $dropzone;

        return $this;
    }

    public function getHidden(): ?bool
    {
        return $this->hidden;
    }

    public function setHidden(?bool $hidden): self
    {
        $this->hidden = $hidden;

        return $this;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getUid(): ?string
    {
        return $this->uid;
    }

    public function setUid(?string $uid): self
    {
        $this->uid = $uid;

        return $this;
    }

    public function getItemId(): ?string
    {
        return $this->itemId;
    }

    public function setItemId(?string $itemId): self
    {
        $this->itemId = $itemId;

        return $this;
    }

    public function getItemProp(): ?string
    {
        return $this->itemProp;
    }

    public function setItemProp(?string $itemProp): self
    {
        $this->itemProp = $itemProp;

        return $this;
    }

    public function getItemRef(): ?string
    {
        return $this->itemRef;
    }

    public function setItemRef(?string $itemRef): self
    {
        $this->itemRef = $itemRef;

        return $this;
    }

    public function getItemScope(): ?string
    {
        return $this->itemScope;
    }

    public function setItemScope(string $itemScope): self
    {
        $this->itemScope = $itemScope;

        return $this;
    }

    public function getItemType(): ?string
    {
        return $this->itemType;
    }

    public function setItemType(?string $itemType): self
    {
        $this->itemType = $itemType;

        return $this;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(?string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(?string $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getTabIndex(): ?int
    {
        return $this->tabIndex;
    }

    public function setTabIndex(?int $tabIndex): self
    {
        $this->tabIndex = $tabIndex;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
