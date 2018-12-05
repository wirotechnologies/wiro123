<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductsInvoice
 *
 * @ORM\Table(name="products_invoice", indexes={@ORM\Index(name="IDX_4B58ED193AF4C300", columns={"id_invoices"}), @ORM\Index(name="IDX_4B58ED19E361B6CF", columns={"id_products"})})
 * @ORM\Entity
 */
class ProductsInvoice
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="products_invoice_id_seq", allocationSize=1, initialValue=1)
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
     * @var \Invoices
     *
     * @ORM\ManyToOne(targetEntity="Invoices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_invoices", referencedColumnName="id")
     * })
     */
    private $idInvoices;

    /**
     * @var \Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_products", referencedColumnName="id")
     * })
     */
    private $idProducts;

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

    public function getIdInvoices(): ?Invoices
    {
        return $this->idInvoices;
    }

    public function setIdInvoices(?Invoices $idInvoices): self
    {
        $this->idInvoices = $idInvoices;

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


}
