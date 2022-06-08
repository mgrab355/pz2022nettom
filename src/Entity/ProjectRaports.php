<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectRaports
 *
 * @ORM\Table(name="project_raports")
 * @ORM\Entity
 */
class ProjectRaports
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="projects_id", type="integer", nullable=false)
     */
    private $projectsId;

    /**
     * @var int
     *
     * @ORM\Column(name="raport_id", type="integer", nullable=false)
     */
    private $raportId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectsId(): ?int
    {
        return $this->projectsId;
    }

    public function setProjectsId(int $projectsId): self
    {
        $this->projectsId = $projectsId;

        return $this;
    }

    public function getRaportId(): ?int
    {
        return $this->raportId;
    }

    public function setRaportId(int $raportId): self
    {
        $this->raportId = $raportId;

        return $this;
    }


}
