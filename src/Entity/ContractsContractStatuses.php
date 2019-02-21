<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * ContractsContractStatuses
 *
 * @ORM\Table(name="contracts_contract_statuses", indexes={@ORM\Index(name="IDX_7ABE58E04342C241", columns={"id_status_causes"}), @ORM\Index(name="IDX_7ABE58E02F706DF9", columns={"id_contract_statuses"}), @ORM\Index(name="IDX_7ABE58E089651554", columns={"id_contracts"})})
 * @ORM\Entity
 * @ApiResource(attributes={"pagination_enabled"=false})
 */
class ContractsContractStatuses
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contracts_contract_statuses_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="note", type="string", length=512, nullable=true)
     */
    private $note;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="active", type="boolean", nullable=true, options={"default"="1"})
     */
    private $active = true;

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
     * @var \StatusCauses
     *
     * @ORM\ManyToOne(targetEntity="StatusCauses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_status_causes", referencedColumnName="id")
     * })
     */
    private $idStatusCauses;

    /**
     * @var \ContractStatuses
     *
     * @ORM\ManyToOne(targetEntity="ContractStatuses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contract_statuses", referencedColumnName="id")
     * })
     */
    private $idContractStatuses;

    /**
     * @var \Contracts
     *
     * @ORM\ManyToOne(targetEntity="Contracts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contracts", referencedColumnName="id")
     * })
     */
    private $idContracts;

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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

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

    public function getIdStatusCauses(): ?StatusCauses
    {
        return $this->idStatusCauses;
    }

    public function setIdStatusCauses(?StatusCauses $idStatusCauses): self
    {
        $this->idStatusCauses = $idStatusCauses;

        return $this;
    }

    public function getIdContractStatuses(): ?ContractStatuses
    {
        return $this->idContractStatuses;
    }

    public function setIdContractStatuses(?ContractStatuses $idContractStatuses): self
    {
        $this->idContractStatuses = $idContractStatuses;

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


}
