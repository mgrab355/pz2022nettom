<?php

namespace App\Entity;

use App\Repository\ProjectRaportsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRaportsRepository::class)]
class ProjectRaports
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $projects_id;

    #[ORM\Column(type: 'integer')]
    private $raport_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectsId(): ?int
    {
        return $this->projects_id;
    }

    public function setProjectsId(int $projects_id): self
    {
        $this->projects_id = $projects_id;

        return $this;
    }

    public function getRaportId(): ?int
    {
        return $this->raport_id;
    }

    public function setRaportId(int $raport_id): self
    {
        $this->raport_id = $raport_id;

        return $this;
    }
}
