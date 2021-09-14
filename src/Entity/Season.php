<?php

namespace App\Entity;

use App\Repository\SeasonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeasonRepository::class)
 */
class Season
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year;

    

    /**
     * @ORM\OneToMany(targetEntity=Player::class, mappedBy="season")
     */
    private $players;

    /**
     * @ORM\ManyToMany(targetEntity=Teams::class, mappedBy="seasons")
     */
    private $teams;

    public function __construct()
    {
        $this->teams = new ArrayCollection();
        $this->players = new ArrayCollection();
    }

    


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    

   

    /**
     * @return Collection|Player[]
     */
    public function getPlayers(): Collection
    {
        return $this->players;
    }

    public function addPlayer(Player $player): self
    {
        if (!$this->players->contains($player)) {
            $this->players[] = $player;
            $player->setSeason($this);
        }

        return $this;
    }

    public function removePlayer(Player $player): self
    {
        if ($this->players->removeElement($player)) {
            // set the owning side to null (unless already changed)
            if ($player->getSeason() === $this) {
                $player->setSeason(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Teams[]
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Teams $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
            $team->addSeason($this);
        }

        return $this;
    }

    public function removeTeam(Teams $team): self
    {
        if ($this->teams->removeElement($team)) {
            $team->removeSeason($this);
        }

        return $this;
    } 
}
