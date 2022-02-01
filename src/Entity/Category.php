<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
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
     * @ORM\OneToMany(targetEntity=Dvd::class, mappedBy="category", cascade={"persist"})
     */
    private $dvds;

    public function __construct()
    {
        $this->dvds = new ArrayCollection();
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

    /**
     * @return Collection|Dvd[]
     */
    public function getDvds(): Collection
    {
        return $this->dvds;
    }

    public function addDvd(Dvd $dvd): self
    {
        if (!$this->dvds->contains($dvd)) {
            $this->dvds[] = $dvd;
            $dvd->setCategory($this);
        }

        return $this;
    }

    public function removeDvd(Dvd $dvd): self
    {
        if ($this->dvds->removeElement($dvd)) {
            // set the owning side to null (unless already changed)
            if ($dvd->getCategory() === $this) {
                $dvd->setCategory(null);
            }
        }

        return $this;
    }
}
