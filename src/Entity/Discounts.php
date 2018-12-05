<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Discounts
 *
 * @ORM\Table(name="discounts", indexes={@ORM\Index(name="IDX_FC5702B83AB77F27", columns={"id_employees"})})
 * @ORM\Entity
 */
class Discounts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="discounts_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $value;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="discount_created_date", type="datetime", nullable=true)
     */
    private $discountCreatedDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="end_discount", type="datetime", nullable=true)
     */
    private $endDiscount;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="percentage", type="boolean", nullable=true)
     */
    private $percentage = false;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=true)
     */
    private $name;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="valid_until", type="datetime", nullable=true)
     */
    private $validUntil;

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
     * @var \Employees
     *
     * @ORM\ManyToOne(targetEntity="Employees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_employees", referencedColumnName="id")
     * })
     */
    private $idEmployees;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getDiscountCreatedDate(): ?\DateTimeInterface
    {
        return $this->discountCreatedDate;
    }

    public function setDiscountCreatedDate(?\DateTimeInterface $discountCreatedDate): self
    {
        $this->discountCreatedDate = $discountCreatedDate;

        return $this;
    }

    public function getEndDiscount(): ?\DateTimeInterface
    {
        return $this->endDiscount;
    }

    public function setEndDiscount(?\DateTimeInterface $endDiscount): self
    {
        $this->endDiscount = $endDiscount;

        return $this;
    }

    public function getPercentage(): ?bool
    {
        return $this->percentage;
    }

    public function setPercentage(?bool $percentage): self
    {
        $this->percentage = $percentage;

        return $this;
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

    public function getValidUntil(): ?\DateTimeInterface
    {
        return $this->validUntil;
    }

    public function setValidUntil(?\DateTimeInterface $validUntil): self
    {
        $this->validUntil = $validUntil;

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

    public function getIdEmployees(): ?Employees
    {
        return $this->idEmployees;
    }

    public function setIdEmployees(?Employees $idEmployees): self
    {
        $this->idEmployees = $idEmployees;

        return $this;
    }


}
