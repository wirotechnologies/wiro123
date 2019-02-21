<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * ContractProducts
 *
 * @ORM\Table(name="contract_products", indexes={@ORM\Index(name="IDX_260D41A5E361B6CF", columns={"id_products"}), @ORM\Index(name="IDX_260D41A589651554", columns={"id_contracts"})})
 * @ORM\Entity
 * @ApiResource(attributes={"pagination_enabled"=false})
 */
class ContractProducts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contract_products_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deactivation", type="datetime", nullable=true)
     */
    private $deactivation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cut_day", type="smallint", nullable=true)
     */
    private $cutDay;

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
     * @var \Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_products", referencedColumnName="id")
     * })
     */
    private $idProducts;

    /**
     * @var \Contracts
     *
     * @ORM\ManyToOne(targetEntity="Contracts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contracts", referencedColumnName="id")
     * })
     */
    private $idContracts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeactivation(): ?\DateTimeInterface
    {
        return $this->deactivation;
    }

    public function setDeactivation(?\DateTimeInterface $deactivation): self
    {
        $this->deactivation = $deactivation;

        return $this;
    }

    public function getCutDay(): ?int
    {
        return $this->cutDay;
    }

    public function setCutDay(?int $cutDay): self
    {
        $this->cutDay = $cutDay;

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

    public function getIdProducts(): ?Products
    {
        return $this->idProducts;
    }

    public function setIdProducts(?Products $idProducts): self
    {
        $this->idProducts = $idProducts;

        return $this;
    }

    public function getIdContracts(): ?Contracts
    {
        return $this->idContracts;
    }

    public function setIdContracts(?Contracts $idContracts): self
    {
        $this->idContracts = $idContracts;

        return $this;
    }


}
