<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * SocioeconomicLevels
 *
 * @ORM\Table(name="socioeconomic_levels", uniqueConstraints={@ORM\UniqueConstraint(name="unique_socioeconomic_level_name", columns={"name"})}, indexes={@ORM\Index(name="IDX_34196D4B6B575F38", columns={"id_socioeconomic_levels_iva"})})
 * @ORM\Entity
 * @ApiResource()
 */
class SocioeconomicLevels
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="socioeconomic_levels_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=258, nullable=true)
     */
    private $description;

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
     * @var \SocioeconomicLevelsIva
     *
     * @ORM\ManyToOne(targetEntity="SocioeconomicLevelsIva")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_socioeconomic_levels_iva", referencedColumnName="id")
     * })
     */
    private $idSocioeconomicLevelsIva;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getIdSocioeconomicLevelsIva(): ?SocioeconomicLevelsIva
    {
        return $this->idSocioeconomicLevelsIva;
    }

    public function setIdSocioeconomicLevelsIva(?SocioeconomicLevelsIva $idSocioeconomicLevelsIva): self
    {
        $this->idSocioeconomicLevelsIva = $idSocioeconomicLevelsIva;

        return $this;
    }

    public function __toString(){
        // to show the name of the Category in the select
        return $this->name;
        // to show the id of the Category in the select
        // return $this->id;
    }


}
