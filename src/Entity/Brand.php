<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BrandRepository")
 */
class Brand
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ampli", mappedBy="brand")
     */
    private $amplis;

    public function __construct()
    {
        $this->amplis = new ArrayCollection();
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
     * @return Collection|Ampli[]
     */
    public function getAmplis(): Collection
    {
        return $this->amplis;
    }

    public function addAmpli(Ampli $ampli): self
    {
        if (!$this->amplis->contains($ampli)) {
            $this->amplis[] = $ampli;
            $ampli->setBrand($this);
        }

        return $this;
    }

    public function removeAmpli(Ampli $ampli): self
    {
        if ($this->amplis->contains($ampli)) {
            $this->amplis->removeElement($ampli);
            // set the owning side to null (unless already changed)
            if ($ampli->getBrand() === $this) {
                $ampli->setBrand(null);
            }
        }

        return $this;
    }
}
