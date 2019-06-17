<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AmpliRepository")
 */
class Ampli
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Brand", inversedBy="amplis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Setting", mappedBy="ampli")
     */
    private $settings;

    public function __construct()
    {
        $this->settings = new ArrayCollection();
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

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection|Setting[]
     */
    public function getSettings(): Collection
    {
        return $this->settings;
    }

    public function addSetting(Setting $setting): self
    {
        if (!$this->settings->contains($setting)) {
            $this->settings[] = $setting;
            $setting->setAmpli($this);
        }

        return $this;
    }

    public function removeSetting(Setting $setting): self
    {
        if ($this->settings->contains($setting)) {
            $this->settings->removeElement($setting);
            // set the owning side to null (unless already changed)
            if ($setting->getAmpli() === $this) {
                $setting->setAmpli(null);
            }
        }

        return $this;
    }

    public function getFullname()
    {
        return $this->getBrand()->getName() . " " . $this->getName();
    }
}
