<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RaportTest
 *
 * @ORM\Table(name="raport_test")
 * @ORM\Entity
 */
class RaportTest
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
     * @ORM\Column(name="nazwa", type="text", length=0, nullable=false)
     */
    private $nazwa;

    /**
     * @var string
     *
     * @ORM\Column(name="opis", type="text", length=0, nullable=false)
     */
    private $opis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwa(): ?string
    {
        return $this->nazwa;
    }

    public function setNazwa(string $nazwa): self
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    public function getOpis(): ?string
    {
        return $this->opis;
    }

    public function setOpis(string $opis): self
    {
        $this->opis = $opis;

        return $this;
    }


}
