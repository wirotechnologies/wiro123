<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employees
 *
 * @ORM\Table(name="employees", uniqueConstraints={@ORM\UniqueConstraint(name="unique_invoices", columns={"id_branches", "docid"})}, indexes={@ORM\Index(name="IDX_BA82C30087BB3DFA", columns={"id_branches"})})
 * @ORM\Entity
 */
class Employees
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="employees_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="docid", type="string", length=24, nullable=true)
     */
    private $docid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=128, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=128, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="userppoe", type="string", length=58, nullable=true)
     */
    private $userppoe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=128, nullable=true)
     */
    private $password;

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

    public function getDocid(): ?string
    {
        return $this->docid;
    }

    public function setDocid(?string $docid): self
    {
        $this->docid = $docid;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getUserppoe(): ?string
    {
        return $this->userppoe;
    }

    public function setUserppoe(?string $userppoe): self
    {
        $this->userppoe = $userppoe;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

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
