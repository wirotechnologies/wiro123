<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Addresses
 *
 * @ORM\Table(name="addresses", indexes={@ORM\Index(name="IDX_6FCA7516AB181CD8", columns={"id_sy_neighborhoods"}), @ORM\Index(name="IDX_6FCA751638E99CEF", columns={"id_socioeconomic_levels"})})
 * @ORM\Entity
 */
class Addresses
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="addresses_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address1", type="string", length=512, nullable=true)
     */
    private $address1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address2", type="string", length=512, nullable=true)
     */
    private $address2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="zipcode", type="decimal", precision=12, scale=0, nullable=true)
     */
    private $zipcode;

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
     * @var \SyNeighborhoods
     *
     * @ORM\ManyToOne(targetEntity="SyNeighborhoods")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sy_neighborhoods", referencedColumnName="id")
     * })
     */
    private $idSyNeighborhoods;

    /**
     * @var \SocioeconomicLevels
     *
     * @ORM\ManyToOne(targetEntity="SocioeconomicLevels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_socioeconomic_levels", referencedColumnName="id")
     * })
     */
    private $idSocioeconomicLevels;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    public function setAddress1(?string $address1): self
    {
        $this->address1 = $address1;

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;

        return $this;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function setZipcode($zipcode): self
    {
        $this->zipcode = $zipcode;

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

    public function getIdSyNeighborhoods(): ?SyNeighborhoods
    {
        return $this->idSyNeighborhoods;
    }

    public function setIdSyNeighborhoods(?SyNeighborhoods $idSyNeighborhoods): self
    {
        $this->idSyNeighborhoods = $idSyNeighborhoods;

        return $this;
    }

    public function getIdSocioeconomicLevels(): ?SocioeconomicLevels
    {
        return $this->idSocioeconomicLevels;
    }

    public function setIdSocioeconomicLevels(?SocioeconomicLevels $idSocioeconomicLevels): self
    {
        $this->idSocioeconomicLevels = $idSocioeconomicLevels;

        return $this;
    }


}
