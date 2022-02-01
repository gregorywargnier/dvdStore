<?php

namespace App\Entity;

use App\Repository\FormatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormatRepository::class)
 */
class Format
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Dvd::class, inversedBy="formats")
     */
    private $dvd;

    public function __construct()
    {
        $this->dvd = new ArrayCollection();
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

    /**
     * @return Collection|Dvd[]
     */
    public function getDvd(): Collection
    {
        return $this->dvd;
    }

    public function addDvd(Dvd $dvd): self
    {
        if (!$this->dvd->contains($dvd)) {
            $this->dvd[] = $dvd;
        }

        return $this;
    }

    public function removeDvd(Dvd $dvd): self
    {
        $this->dvd->removeElement($dvd);

        return $this;
    }
}
