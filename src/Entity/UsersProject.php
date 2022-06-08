<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsersProject
 *
 * @ORM\Table(name="users_project")
 * @ORM\Entity
 */
class UsersProject
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
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

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

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }


}
