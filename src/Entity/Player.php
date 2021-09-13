<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $matchPlayed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $playTime;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $goalScored;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $decisivePass;

    /**
     * @ORM\ManyToOne(targetEntity=Season::class, inversedBy="players")
     */
    private $season;

    /**
     * @ORM\ManyToOne(targetEntity=Teams::class, inversedBy="players")
     */
    private $teams;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(?\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getMatchPlayed(): ?int
    {
        return $this->matchPlayed;
    }

    public function setMatchPlayed(?int $matchPlayed): self
    {
        $this->matchPlayed = $matchPlayed;

        return $this;
    }

    public function getPlayTime(): ?int
    {
        return $this->playTime;
    }

    public function setPlayTime(?int $playTime): self
    {
        $this->playTime = $playTime;

        return $this;
    }

    public function getGoalScored(): ?int
    {
        return $this->goalScored;
    }

    public function setGoalScored(?int $goalScored): self
    {
        $this->goalScored = $goalScored;

        return $this;
    }

    public function getDecisivePass(): ?int
    {
        return $this->decisivePass;
    }

    public function setDecisivePass(?int $decisivePass): self
    {
        $this->decisivePass = $decisivePass;

        return $this;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(?Season $season): self
    {
        $this->season = $season;

        return $this;
    }

    public function getTeams(): ?Teams
    {
        return $this->teams;
    }

    public function setTeams(?Teams $teams): self
    {
        $this->teams = $teams;

        return $this;
    }

    
  
}
