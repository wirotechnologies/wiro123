<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductContractDiscounts
 *
 * @ORM\Table(name="product_contract_discounts", indexes={@ORM\Index(name="IDX_2316DF52D73A29B2", columns={"id_contract_products"}), @ORM\Index(name="IDX_2316DF527C62BE9F", columns={"id_discounts"})})
 * @ORM\Entity
 */
class ProductContractDiscounts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="product_contract_discounts_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * @var \ContractProducts
     *
     * @ORM\ManyToOne(targetEntity="ContractProducts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contract_products", referencedColumnName="id")
     * })
     */
    private $idContractProducts;

    /**
     * @var \Discounts
     *
     * @ORM\ManyToOne(targetEntity="Discounts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_discounts", referencedColumnName="id")
     * })
     */
    private $idDiscounts;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdContractProducts(): ?ContractProducts
    {
        return $this->idContractProducts;
    }

    public function setIdContractProducts(?ContractProducts $idContractProducts): self
    {
        $this->idContractProducts = $idContractProducts;

        return $this;
    }

    public function getIdDiscounts(): ?Discounts
    {
        return $this->idDiscounts;
    }

    public function setIdDiscounts(?Discounts $idDiscounts): self
    {
        $this->idDiscounts = $idDiscounts;

        return $this;
    }


}
