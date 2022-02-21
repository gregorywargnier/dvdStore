<?php

namespace App\Entity;

use App\Repository\DvdRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DvdRepository::class)
 */
class Dvd
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock;

    /**
     * @ORM\ManyToOne(targetEntity=category::class, inversedBy="dvds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Format::class, mappedBy="dvd")
     */
    private $formats;

    public function __construct()
    {
        $this->formats = new ArrayCollection();
    }

    /**
     * return a slug !
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     *
     * @return void
     */
    public function initializeSlug() {
        $slugify = new Slugify();
        $this->slug = $slugify->slugify($this->name);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Collection|Format[]
     */
    public function getFormats(): Collection
    {
        return $this->formats;
    }

    public function addFormat(Format $format): self
    {
        if (!$this->formats->contains($format)) {
            $this->formats[] = $format;
            $format->addDvd($this);
        }

        return $this;
    }

    public function removeFormat(Format $format): self
    {
        if ($this->formats->removeElement($format)) {
            $format->removeDvd($this);
        }

        return $this;
    }
}
