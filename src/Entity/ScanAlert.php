<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ScanAlert
 *
 * @ORM\Table(name="scan_alert", indexes={@ORM\Index(name="scan_alert_project__fk", columns={"project_id"}), @ORM\Index(name="scan_alert_scans_id__fk", columns={"scans_id"})})
 * @ORM\Entity
 */
class ScanAlert
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
     * @ORM\Column(name="risk", type="string", length=255, nullable=false)
     */
    private $risk;

    /**
     * @var string
     *
     * @ORM\Column(name="param", type="string", length=255, nullable=false)
     */
    private $param;

    /**
     * @var string
     *
     * @ORM\Column(name="evidence", type="string", length=255, nullable=false)
     */
    private $evidence;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="confidence", type="string", length=255, nullable=false)
     */
    private $confidence;

    /**
     * @var string
     *
     * @ORM\Column(name="solution", type="string", length=1000, nullable=false)
     */
    private $solution;

    /**
     * @var string
     *
     * @ORM\Column(name="method", type="string", length=10, nullable=false)
     */
    private $method;

    /**
     * @var string
     *
     * @ORM\Column(name="sourceid", type="string", length=255, nullable=false)
     */
    private $sourceid;

    /**
     * @var int
     *
     * @ORM\Column(name="plugin_id", type="integer", nullable=false)
     */
    private $pluginId;

    /**
     * @var int
     *
     * @ORM\Column(name="cweid", type="integer", nullable=false)
     */
    private $cweid;

    /**
     * @var int
     *
     * @ORM\Column(name="wascid", type="integer", nullable=false)
     */
    private $wascid;

    /**
     * @var int
     *
     * @ORM\Column(name="messege_id", type="integer", nullable=false)
     */
    private $messegeId;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="alert_ref", type="text", length=16777215, nullable=false)
     */
    private $alertRef;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference", type="string", length=1000, nullable=true)
     */
    private $reference;

    /**
     * @var \Project
     *
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     * })
     */
    private $project;

    /**
     * @var \ScansId
     *
     * @ORM\ManyToOne(targetEntity="ScansId")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="scans_id", referencedColumnName="id")
     * })
     */
    private $scans;

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

    public function getRisk(): ?string
    {
        return $this->risk;
    }

    public function setRisk(string $risk): self
    {
        $this->risk = $risk;

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

    public function getEvidence(): ?string
    {
        return $this->evidence;
    }

    public function setEvidence(string $evidence): self
    {
        $this->evidence = $evidence;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getConfidence(): ?string
    {
        return $this->confidence;
    }

    public function setConfidence(string $confidence): self
    {
        $this->confidence = $confidence;

        return $this;
    }

    public function getSolution(): ?string
    {
        return $this->solution;
    }

    public function setSolution(string $solution): self
    {
        $this->solution = $solution;

        return $this;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getSourceid(): ?string
    {
        return $this->sourceid;
    }

    public function setSourceid(string $sourceid): self
    {
        $this->sourceid = $sourceid;

        return $this;
    }

    public function getPluginId(): ?int
    {
        return $this->pluginId;
    }

    public function setPluginId(int $pluginId): self
    {
        $this->pluginId = $pluginId;

        return $this;
    }

    public function getCweid(): ?int
    {
        return $this->cweid;
    }

    public function setCweid(int $cweid): self
    {
        $this->cweid = $cweid;

        return $this;
    }

    public function getWascid(): ?int
    {
        return $this->wascid;
    }

    public function setWascid(int $wascid): self
    {
        $this->wascid = $wascid;

        return $this;
    }

    public function getMessegeId(): ?int
    {
        return $this->messegeId;
    }

    public function setMessegeId(int $messegeId): self
    {
        $this->messegeId = $messegeId;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAlertRef(): ?string
    {
        return $this->alertRef;
    }

    public function setAlertRef(string $alertRef): self
    {
        $this->alertRef = $alertRef;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getScans(): ?ScansId
    {
        return $this->scans;
    }

    public function setScans(?ScansId $scans): self
    {
        $this->scans = $scans;

        return $this;
    }


}
