<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Serializer\Filter\GroupFilter;


/**
 * CustomersAddress
 *
 * @ORM\Table(name="customers_address", indexes={@ORM\Index(name="IDX_3106BC64E266F206", columns={"id_customers"}), @ORM\Index(name="IDX_3106BC64EFFFC931", columns={"id_addresses"})})
 * @ORM\Entity
 * @ApiResource(
 * normalizationContext={"groups"={"customers_address", "customers_address:customer", "customer", "customers_address:address", "address"}},
 * denormalizationContext={"groups"={"customers_address", "customers_address:customer", "customer", "customers_address:address", "address"}}
 *)
  * @ApiFilter(SearchFilter::class, properties={"idCustomers": "exact", "idCustomers[docid]": "exact"})
 */
class CustomersAddress
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="customers_address_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="active", type="boolean", nullable=true, options={"default"="1"})
     * @Groups("customers_address")
     */
    private $active = true;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="start_active", type="datetime", nullable=true)
     * @Groups("customers_address")
     */
    private $startActive;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="end_active", type="datetime", nullable=true)
     * @Groups("customers_address")
     */
    private $endActive;

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
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_customers", referencedColumnName="id")
     * })s
     * @Groups("customers_address:customer")
     */
    private $idCustomers;

    /**
     * @var \Addresses
     *
     * @ORM\ManyToOne(targetEntity="Addresses",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_addresses", referencedColumnName="id")
     * })
     * @Groups("customers_address:address")
     */
    private $idAddresses;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getStartActive(): ?\DateTimeInterface
    {
        return $this->startActive;
    }

    public function setStartActive(?\DateTimeInterface $startActive): self
    {
        $this->startActive = $startActive;

        return $this;
    }

    public function getEndActive(): ?\DateTimeInterface
    {
        return $this->endActive;
    }

    public function setEndActive(?\DateTimeInterface $endActive): self
    {
        $this->endActive = $endActive;

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

    public function getIdCustomers(): ?Customers
    {
        return $this->idCustomers;
    }

    public function setIdCustomers(?Customers $idCustomers): self
    {
        $this->idCustomers = $idCustomers;

        return $this;
    }

    public function getIdAddresses(): ?Addresses
    {
        return $this->idAddresses;
    }

    public function setIdAddresses(?Addresses $idAddresses): self
    {
        $this->idAddresses = $idAddresses;

        return $this;
    }


}
