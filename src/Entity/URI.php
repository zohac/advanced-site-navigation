<?php

namespace App\Entity;

use App\Repository\URIRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=URIRepository::class)
 */
class URI
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(name="scheme", type="string", length=255, nullable=true)
     */
    private ?string $scheme;

    /**
     * @ORM\Column(name="host", type="string", length=255, nullable=true)
     */
    private ?string $host;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $port;

    /**
     * @ORM\Column(name="uri_user", type="string", length=255, nullable=true)
     */
    private ?string $user;

    /**
     * @ORM\Column(name="uri_pass", type="string", length=255, nullable=true)
     */
    private ?string $pass;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $path;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?array $query;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $fragment;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $raw;

    public function __construct(string $url = null)
    {
        // weak type check to also accept null until we can add scalar type hints
        if (null !== $url) {
            $this->init($url);
        }
    }

    /**
     * @return $this
     */
    public function init(string $url): self
    {
        $parts = parse_url($url);
        if (false === $parts) {
            throw new \InvalidArgumentException("Unable to parse URI: $url");
        }

        foreach ($parts as $key => $value) {
            $this->$key = $value;
        }

        $this->raw = $url;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getAbsolutePath();
    }

    /**
     * URL structure :
     *      scheme://username:password@hostname:port/path?arg=value#anchor.
     */
    public function getAbsolutePath(): string
    {
        $url = null === $this->scheme ? '' : $this->scheme.'://';
        $url .= $this->user ?? '';
        $url .= null === $this->pass ? '' : ':'.$this->pass;
        $url .= $this->host ?? '';
        $url .= null === $this->port ? '' : ':'.$this->port;
        $url .= $this->getRelativePath();

        return $url;
    }

    public function getRelativePath(): string
    {
        $url = $this->path ?? '';

        $counter = 0;
        if ($this->query) {
            foreach ($this->query as $value) {
                $url .= 0 === $counter ? '?'.$value : '&'.$value;
                ++$counter;
            }
        }

        $url .= null === $this->fragment ? '' : '#'.$this->fragment;

        return $url;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScheme(): ?string
    {
        return $this->scheme;
    }

    /**
     * @return $this
     */
    public function setScheme(?string $scheme): self
    {
        $this->scheme = $scheme;

        return $this;
    }

    public function getHost(): ?string
    {
        return $this->host;
    }

    /**
     * @return $this
     */
    public function setHost(?string $host): self
    {
        $this->host = $host;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @return $this
     */
    public function setUser(?string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    /**
     * @return $this
     */
    public function setPass(?string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    /**
     * @return $this
     */
    public function setPort(?int $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @return $this
     */
    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getQuery(): ?array
    {
        return $this->query;
    }

    /**
     * @param string[] $query
     * @return $this
     */
    public function setQuery(array $query = []): self
    {
        $this->query = $query;

        return $this;
    }

    public function getFragment(): ?string
    {
        return $this->fragment;
    }

    /**
     * @return $this
     */
    public function setFragment(?string $fragment): self
    {
        $this->fragment = $fragment;

        return $this;
    }

    public function getRaw(): ?string
    {
        return $this->raw;
    }
}
