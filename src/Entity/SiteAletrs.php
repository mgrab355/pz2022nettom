<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SiteAletrs
 *
 * @ORM\Table(name="site_aletrs")
 * @ORM\Entity
 */
class SiteAletrs
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
     * @ORM\Column(name="informational", type="string", length=255, nullable=false)
     */
    private $informational;

    /**
     * @var string
     *
     * @ORM\Column(name="low", type="string", length=255, nullable=false)
     */
    private $low;

    /**
     * @var string
     *
     * @ORM\Column(name="medium", type="string", length=255, nullable=false)
     */
    private $medium;

    /**
     * @var string
     *
     * @ORM\Column(name="high", type="string", length=255, nullable=false)
     */
    private $high;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInformational(): ?string
    {
        return $this->informational;
    }

    public function setInformational(string $informational): self
    {
        $this->informational = $informational;

        return $this;
    }

    public function getLow(): ?string
    {
        return $this->low;
    }

    public function setLow(string $low): self
    {
        $this->low = $low;

        return $this;
    }

    public function getMedium(): ?string
    {
        return $this->medium;
    }

    public function setMedium(string $medium): self
    {
        $this->medium = $medium;

        return $this;
    }

    public function getHigh(): ?string
    {
        return $this->high;
    }

    public function setHigh(string $high): self
    {
        $this->high = $high;

        return $this;
    }


}
