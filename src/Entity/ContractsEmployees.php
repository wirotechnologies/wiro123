<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContractsEmployees
 *
 * @ORM\Table(name="contracts_employees", indexes={@ORM\Index(name="IDX_62D9DE243AB77F27", columns={"id_employees"}), @ORM\Index(name="IDX_62D9DE2489651554", columns={"id_contracts"}), @ORM\Index(name="IDX_62D9DE2475B0E2A7", columns={"id_events"})})
 * @ORM\Entity
 */
class ContractsEmployees
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contracts_employees_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="note", type="string", length=512, nullable=true)
     */
    private $note;

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

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

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

    public function getIdContracts(): ?Contracts
    {
        return $this->idContracts;
    }

    public function setIdContracts(?Contracts $idContracts): self
    {
        $this->idContracts = $idContracts;

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
