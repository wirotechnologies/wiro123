<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * AuthorizedNumInvoices
 *
 * @ORM\Table(name="authorized_num_invoices")
 * @ORM\Entity
 * @ApiResource(attributes={"pagination_enabled"=false})
 */
class AuthorizedNumInvoices
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="authorized_num_invoices_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_number", type="decimal", precision=12, scale=0, nullable=true)
     */
    private $firstNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_number", type="decimal", precision=12, scale=0, nullable=true)
     */
    private $lastNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="current_number", type="decimal", precision=12, scale=0, nullable=true)
     */
    private $currentNumber;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstNumber()
    {
        return $this->firstNumber;
    }

    public function setFirstNumber($firstNumber): self
    {
        $this->firstNumber = $firstNumber;

        return $this;
    }

    public function getLastNumber()
    {
        return $this->lastNumber;
    }

    public function setLastNumber($lastNumber): self
    {
        $this->lastNumber = $lastNumber;

        return $this;
    }

    public function getCurrentNumber()
    {
        return $this->currentNumber;
    }

    public function setCurrentNumber($currentNumber): self
    {
        $this->currentNumber = $currentNumber;

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


}
