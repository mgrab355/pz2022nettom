<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageAlert
 *
 * @ORM\Table(name="page_alert")
 * @ORM\Entity
 */
class PageAlert
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="evidence", type="string", length=255, nullable=false)
     */
    private $evidence;

    /**
     * @var string
     *
     * @ORM\Column(name="alert_id", type="string", length=255, nullable=false)
     */
    private $alertId;

    /**
     * @var string
     *
     * @ORM\Column(name="risk", type="string", length=255, nullable=false)
     */
    private $risk;

    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="string", length=255, nullable=false)
     */
    private $uri;

    /**
     * @var string
     *
     * @ORM\Column(name="param", type="string", length=255, nullable=false)
     */
    private $param;

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

    public function getAlertId(): ?string
    {
        return $this->alertId;
    }

    public function setAlertId(string $alertId): self
    {
        $this->alertId = $alertId;

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

    public function getParam(): ?string
    {
        return $this->param;
    }

    public function setParam(string $param): self
    {
        $this->param = $param;

        return $this;
    }


}
