<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MusicRepository")
 */
class Music
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
    private $title;
    /**
    /**
     * @ORM\Column(type="decimal", precision=2, scale=1)
     */
    private $treble;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=1)
     */
    private $bass;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=1)
     */
    private $middle;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=1)
     */
    private $gain;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=1)
     */
    private $reverb;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artist", inversedBy="musics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $artist;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Setting", mappedBy="music")
     */
    private $settings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="music")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rank", mappedBy="music")
     */
    private $ranks;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="musics")
     */
    private $users;

    public function __construct()
    {
        $this->settings = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->ranks = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
    public function getTreble()
    {
        return $this->treble;
    }

    public function setTreble($treble): self
    {
        $this->treble = $treble;

        return $this;
    }

    public function getBass()
    {
        return $this->bass;
    }

    public function setBass($bass): self
    {
        $this->bass = $bass;

        return $this;
    }

    public function getMiddle()
    {
        return $this->middle;
    }

    public function setMiddle($middle): self
    {
        $this->middle = $middle;

        return $this;
    }

    public function getGain()
    {
        return $this->gain;
    }

    public function setGain($gain): self
    {
        $this->gain = $gain;

        return $this;
    }

    public function getReverb()
    {
        return $this->reverb;
    }

    public function setReverb($reverb): self
    {
        $this->reverb = $reverb;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist $artist): self
    {
        $this->artist = $artist;

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
            $setting->setMusic($this);
        }

        return $this;
    }

    public function removeSetting(Setting $setting): self
    {
        if ($this->settings->contains($setting)) {
            $this->settings->removeElement($setting);
            // set the owning side to null (unless already changed)
            if ($setting->getMusic() === $this) {
                $setting->setMusic(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setMusic($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getMusic() === $this) {
                $comment->setMusic(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rank[]
     */
    public function getRanks(): Collection
    {
        return $this->ranks;
    }

    public function addRank(Rank $rank): self
    {
        if (!$this->ranks->contains($rank)) {
            $this->ranks[] = $rank;
            $rank->setMusic($this);
        }

        return $this;
    }

    public function removeRank(Rank $rank): self
    {
        if ($this->ranks->contains($rank)) {
            $this->ranks->removeElement($rank);
            // set the owning side to null (unless already changed)
            if ($rank->getMusic() === $this) {
                $rank->setMusic(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addMusic($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeMusic($this);
        }

        return $this;
    }
}
