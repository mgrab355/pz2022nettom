<?php

namespace App\Entity;

use App\Repository\ScanAlertRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\String_;

#[ORM\Entity(repositoryClass: ScanAlertRepository::class)]
class ScanAlert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $risk;

    #[ORM\Column(type: 'string', length: 255)]
    private $param;

    #[ORM\Column(type: 'string', length: 255)]
    private $evidence;

    #[ORM\Column(type: 'string', length: 1000)]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $confidence;

    #[ORM\Column(type: 'string', length: 1000)]
    private $solution;

    #[ORM\Column(type: 'string', length: 10)]
    private $method;

    #[ORM\Column(type: 'string', length: 255)]
    private $sourceid;

    #[ORM\Column(type: 'integer')]
    private $pluginID;

    #[ORM\Column(type: 'integer')]
    private $cweid;

    #[ORM\Column(type: 'integer')]
    private $wascid;

    #[ORM\Column(type: 'integer')]
    private $messegeId;

    #[ORM\Column(type: 'string', length: 255)]
    private $url;

    #[ORM\Column(type: 'string', length: 100000)]
    private $alertRef;

    #[ORM\Column(type: 'string', length: 1000, nullable: true)]
    private $reference;


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

    public function getPluginID(): ?int
    {
        return $this->pluginID;
    }

    public function setPluginID(int $pluginID): self
    {
        $this->pluginID = $pluginID;

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

    public function setAlertRef(?string $alertRef): self
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
}
