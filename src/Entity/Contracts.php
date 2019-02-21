<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\DataPersister\ContractsDataPersister;

/**
 * Contracts
 *
 * @ORM\Table(name="contracts", uniqueConstraints={@ORM\UniqueConstraint(name="number_unique", columns={"number"})}, indexes={@ORM\Index(name="IDX_950A9732757A812", columns={"id_contract_types"}), @ORM\Index(name="IDX_950A973E266F206", columns={"id_customers"}), @ORM\Index(name="IDX_950A973BA3D72F6", columns={"id_recurrence"}), @ORM\Index(name="IDX_950A97387BB3DFA", columns={"id_branches"})})
 * @ORM\Entity
 * @ApiResource(attributes={"pagination_enabled"=false})
 */
class Contracts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contracts_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     */
    private $number;

    /**
     * @var int|null
     *
     * @ORM\Column(name="past_due_days", type="integer", nullable=true)
     */
    private $pastDueDays;

    /**
     * @var string|null
     *
     * @ORM\Column(name="balance", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $balance;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="start", type="datetime", nullable=true)
     */
    private $start;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_payment", type="datetime", nullable=true)
     */
    private $lastPayment;

    /**
     * @var int|null
     *
     * @ORM\Column(name="last_invoice", type="integer", nullable=true)
     */
    private $lastInvoice;

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
     * @var \ContractTypes
     *
     * @ORM\ManyToOne(targetEntity="ContractTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contract_types", referencedColumnName="id")
     * })
     */
    private $idContractTypes;

    /**
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_customers", referencedColumnName="id")
     * })
     */
    private $idCustomers;

    /**
     * @var \Recurrence
     *
     * @ORM\ManyToOne(targetEntity="Recurrence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_recurrence", referencedColumnName="id")
     * })
     */
    private $idRecurrence;

    /**
     * @var \Branches
     *
     * @ORM\ManyToOne(targetEntity="Branches")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_branches", referencedColumnName="id")
     * })
     */
    private $idBranches;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getPastDueDays(): ?int
    {
        return $this->pastDueDays;
    }

    public function setPastDueDays(?int $pastDueDays): self
    {
        $this->pastDueDays = $pastDueDays;

        return $this;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function setBalance($balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(?\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getLastPayment(): ?\DateTimeInterface
    {
        return $this->lastPayment;
    }

    public function setLastPayment(?\DateTimeInterface $lastPayment): self
    {
        $this->lastPayment = $lastPayment;

        return $this;
    }

    public function getLastInvoice(): ?int
    {
        return $this->lastInvoice;
    }

    public function setLastInvoice(?int $lastInvoice): self
    {
        $this->lastInvoice = $lastInvoice;

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

    public function getIdContractTypes(): ?ContractTypes
    {
        return $this->idContractTypes;
    }

    public function setIdContractTypes(?ContractTypes $idContractTypes): self
    {
        $this->idContractTypes = $idContractTypes;

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

    public function getIdRecurrence(): ?Recurrence
    {
        return $this->idRecurrence;
    }

    public function setIdRecurrence(?Recurrence $idRecurrence): self
    {
        $this->idRecurrence = $idRecurrence;

        return $this;
    }

    public function getIdBranches(): ?Branches
    {
        return $this->idBranches;
    }

    public function setIdBranches(?Branches $idBranches): self
    {
        $this->idBranches = $idBranches;

        return $this;
    }


}
