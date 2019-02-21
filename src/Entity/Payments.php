<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Payments
 *
 * @ORM\Table(name="payments", indexes={@ORM\Index(name="IDX_65D29B32BEA7F41B", columns={"id_payment_receipts"}), @ORM\Index(name="IDX_65D29B3289651554", columns={"id_contracts"}), @ORM\Index(name="IDX_65D29B329A137239", columns={"id_accounts"})})
 * @ORM\Entity
 * @ApiResource(attributes={"pagination_enabled"=false})
 */
class Payments
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="payments_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $value;

    /**
     * @var string|null
     *
     * @ORM\Column(name="note", type="string", length=258, nullable=true)
     */
    private $note;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="pay_date", type="date", nullable=true)
     */
    private $payDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="file_path", type="string", length=78, nullable=true)
     */
    private $filePath;

    /**
     * @var string|null
     *
     * @ORM\Column(name="file_name", type="string", length=78, nullable=true)
     */
    private $fileName;

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
     * @var \PaymentReceipts
     *
     * @ORM\ManyToOne(targetEntity="PaymentReceipts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_payment_receipts", referencedColumnName="id")
     * })
     */
    private $idPaymentReceipts;

    /**
     * @var \Contracts
     *
     * @ORM\ManyToOne(targetEntity="Contracts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contracts", referencedColumnName="id")
     * })
     */
    private $idContracts;

    /**
     * @var \Accounts
     *
     * @ORM\ManyToOne(targetEntity="Accounts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_accounts", referencedColumnName="id")
     * })
     */
    private $idAccounts;

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

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getPayDate(): ?\DateTimeInterface
    {
        return $this->payDate;
    }

    public function setPayDate(?\DateTimeInterface $payDate): self
    {
        $this->payDate = $payDate;

        return $this;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(?string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName;

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

    public function getIdPaymentReceipts(): ?PaymentReceipts
    {
        return $this->idPaymentReceipts;
    }

    public function setIdPaymentReceipts(?PaymentReceipts $idPaymentReceipts): self
    {
        $this->idPaymentReceipts = $idPaymentReceipts;

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

    public function getIdAccounts(): ?Accounts
    {
        return $this->idAccounts;
    }

    public function setIdAccounts(?Accounts $idAccounts): self
    {
        $this->idAccounts = $idAccounts;

        return $this;
    }


}
