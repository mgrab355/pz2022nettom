<?php

namespace App\Entity;

use App\Repository\PageAlertRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageAlertRepository::class)]
class PageAlert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $evidence;

    #[ORM\Column(type: 'string', length: 255)]
    private $param;

    #[ORM\Column(type: 'string', length: 255)]
    private $risk;

    #[ORM\Column(type: 'string', length: 255)]
    private $uri;

    #[ORM\Column(type: 'string')]
    private $alert_id;

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

    public function getEvidence(): ?string
    {
        return $this->evidence;
    }

    public function setEvidence(string $evidence): self
    {
        $this->evidence = $evidence;

        return $this;
    }

    public function getParam(): ?string
    {
        return $this->param;
    }

    public function setParam(string $param): self
    {
        $this->param = $param;

        return $this;
    }

    public function getRisk(): ?string
    {
        return $this->risk;
    }

    public function setRisk(string $risk): self
    {
        $this->risk = $risk;

        return $this;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }

    public function getAlertId(): ?string
    {
        return $this->alert_id;
    }

    public function setAlertId(string $alert_id): self
    {
        $this->alert_id = $alert_id;

        return $this;
    }
}
