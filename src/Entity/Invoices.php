<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Invoices
 *
 * @ORM\Table(name="invoices", uniqueConstraints={@ORM\UniqueConstraint(name="unique_invoice", columns={"id_branches", "docid"})}, indexes={@ORM\Index(name="IDX_6A2F2F953AB77F27", columns={"id_employees"}), @ORM\Index(name="IDX_6A2F2F9587BB3DFA", columns={"id_branches"})})
 * @ORM\Entity
 * @ApiResource(attributes={"pagination_enabled"=false})
 */
class Invoices
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="invoices_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="invoice_date", type="datetime", nullable=true)
     */
    private $invoiceDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="total_value", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $totalValue;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deadline_pay", type="datetime", nullable=true)
     */
    private $deadlinePay;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value_past_due", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valuePastDue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="new_balance", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $newBalance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference_payment", type="decimal", precision=20, scale=0, nullable=true)
     */
    private $referencePayment;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="suspension_date", type="datetime", nullable=true)
     */
    private $suspensionDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="accounts_number_past_due", type="smallint", nullable=true)
     */
    private $accountsNumberPastDue;

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
     * @var string|null
     *
     * @ORM\Column(name="docid", type="string", length=12, nullable=true)
     */
    private $docid;

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

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(?\DateTimeInterface $invoiceDate): self
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    public function getTotalValue()
    {
        return $this->totalValue;
    }

    public function setTotalValue($totalValue): self
    {
        $this->totalValue = $totalValue;

        return $this;
    }

    public function getDeadlinePay(): ?\DateTimeInterface
    {
        return $this->deadlinePay;
    }

    public function setDeadlinePay(?\DateTimeInterface $deadlinePay): self
    {
        $this->deadlinePay = $deadlinePay;

        return $this;
    }

    public function getValuePastDue()
    {
        return $this->valuePastDue;
    }

    public function setValuePastDue($valuePastDue): self
    {
        $this->valuePastDue = $valuePastDue;

        return $this;
    }

    public function getNewBalance()
    {
        return $this->newBalance;
    }

    public function setNewBalance($newBalance): self
    {
        $this->newBalance = $newBalance;

        return $this;
    }

    public function getReferencePayment()
    {
        return $this->referencePayment;
    }

    public function setReferencePayment($referencePayment): self
    {
        $this->referencePayment = $referencePayment;

        return $this;
    }

    public function getSuspensionDate(): ?\DateTimeInterface
    {
        return $this->suspensionDate;
    }

    public function setSuspensionDate(?\DateTimeInterface $suspensionDate): self
    {
        $this->suspensionDate = $suspensionDate;

        return $this;
    }

    public function getAccountsNumberPastDue(): ?int
    {
        return $this->accountsNumberPastDue;
    }

    public function setAccountsNumberPastDue(?int $accountsNumberPastDue): self
    {
        $this->accountsNumberPastDue = $accountsNumberPastDue;

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

    public function getDocid(): ?string
    {
        return $this->docid;
    }

    public function setDocid(?string $docid): self
    {
        $this->docid = $docid;

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
