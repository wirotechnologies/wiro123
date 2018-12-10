<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SyNeighborhoods
 *
 * @ORM\Table(name="sy_neighborhoods", indexes={@ORM\Index(name="IDX_48924909A10F54B4", columns={"id_sy_cities"})})
 * @ORM\Entity
 */
class SyNeighborhoods
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sy_neighborhoods_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_date", type="datetime", nullable=true)
     */
    private $updatedDate;

    /**
     * @var \SyCities
     *
     * @ORM\ManyToOne(targetEntity="SyCities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sy_cities", referencedColumnName="id")
     * })
     */
    private $idSyCities;

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

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(?\DateTimeInterface $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getUpdatedDate(): ?\DateTimeInterface
    {
        return $this->updatedDate;
    }

    public function setUpdatedDate(?\DateTimeInterface $updatedDate): self
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    public function getIdSyCities(): ?SyCities
    {
        return $this->idSyCities;
    }

    public function setIdSyCities(?SyCities $idSyCities): self
    {
        $this->idSyCities = $idSyCities;

        return $this;
    }


}
