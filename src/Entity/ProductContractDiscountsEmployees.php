<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * ProductContractDiscountsEmployees
 *
 * @ORM\Table(name="product_contract_discounts_employees", indexes={@ORM\Index(name="IDX_C5C0A12D5BB31A84", columns={"id_product_contract_discounts"}), @ORM\Index(name="IDX_C5C0A12D3AB77F27", columns={"id_employees"}), @ORM\Index(name="IDX_C5C0A12D75B0E2A7", columns={"id_events"})})
 * @ORM\Entity
 * @ApiResource(attributes={"pagination_enabled"=false})
 */
class ProductContractDiscountsEmployees
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="product_contract_discounts_employees_id_seq", allocationSize=1, initialValue=1)
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
     * @var \ProductContractDiscounts
     *
     * @ORM\ManyToOne(targetEntity="ProductContractDiscounts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product_contract_discounts", referencedColumnName="id")
     * })
     */
    private $idProductContractDiscounts;

    /**
     * @var \Employees
     *
     * @ORM\ManyToOne(targetEntity="Employees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_employees", referencedColumnName="id")
     * })
     */
    private $idEmployees;

    /**
     * @var \Events
     *
     * @ORM\ManyToOne(targetEntity="Events")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_events", referencedColumnName="id")
     * })
     */
    private $idEvents;

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

    public function getIdProductContractDiscounts(): ?ProductContractDiscounts
    {
        return $this->idProductContractDiscounts;
    }

    public function setIdProductContractDiscounts(?ProductContractDiscounts $idProductContractDiscounts): self
    {
        $this->idProductContractDiscounts = $idProductContractDiscounts;

        return $this;
    }

    public function getIdEmployees(): ?Employees
    {
        return $this->idEmployees;
    }

    public function setIdEmployees(?Employees $idEmployees): self
    {
        $this->idEmployees = $idEmployees;

        return $this;
    }

    public function getIdEvents(): ?Events
    {
        return $this->idEvents;
    }

    public function setIdEvents(?Events $idEvents): self
    {
        $this->idEvents = $idEvents;

        return $this;
    }


}
