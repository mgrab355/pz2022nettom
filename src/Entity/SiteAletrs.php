<?php

namespace App\Entity;

use App\Repository\SiteAletrsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SiteAletrsRepository::class)]
class SiteAletrs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Informational;

    #[ORM\Column(type: 'string', length: 255)]
    private $Low;

    #[ORM\Column(type: 'string', length: 255)]
    private $Medium;

    #[ORM\Column(type: 'string', length: 255)]
    private $High;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInformational(): ?string
    {
        return $this->Informational;
    }

    public function setInformational(string $Informational): self
    {
        $this->Informational = $Informational;

        return $this;
    }

    public function getLow(): ?string
    {
        return $this->Low;
    }

    public function setLow(string $Low): self
    {
        $this->Low = $Low;

        return $this;
    }

    public function getMedium(): ?string
    {
        return $this->Medium;
    }

    public function setMedium(string $Medium): self
    {
        $this->Medium = $Medium;

        return $this;
    }

    public function getHigh(): ?string
    {
        return $this->High;
    }

    public function setHigh(string $High): self
    {
        $this->High = $High;

        return $this;
    }
}
