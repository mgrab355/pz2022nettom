<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ScansId
 *
 * @ORM\Table(name="scans_id")
 * @ORM\Entity
 */
class ScansId
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
     * @var string
     *
     * @ORM\Column(name="project_id", type="text", length=0, nullable=false)
     */
    private $projectId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjectId(): ?string
    {
        return $this->projectId;
    }

    public function setProjectId(string $projectId): self
    {
        $this->projectId = $projectId;

        return $this;
    }


}
