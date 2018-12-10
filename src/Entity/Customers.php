<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @ORM\Table(name="customers", uniqueConstraints={@ORM\UniqueConstraint(name="unique_customer_docid", columns={"docid"}), @ORM\UniqueConstraint(name="unique_customer_email", columns={"email"})}, indexes={@ORM\Index(name="IDX_62534E2140D6C54", columns={"id_docid_types"}), @ORM\Index(name="IDX_62534E2187BB3DFA", columns={"id_branches"})})
 * @ORM\Entity
 */
class Customers
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="customers_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=258, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=258, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=128, nullable=true)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=50, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference_1", type="string", length=58, nullable=true)
     */
    private $reference1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone_reference_1", type="string", length=58, nullable=true)
     */
    private $phoneReference1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="docid", type="string", length=58, nullable=true)
     */
    private $docid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="coordinates", type="string", length=58, nullable=true)
     */
    private $coordinates;

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
     * @var \DocidTypes
     *
     * @ORM\ManyToOne(targetEntity="DocidTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_docid_types", referencedColumnName="id")
     * })
     */
    private $idDocidTypes;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getReference1(): ?string
    {
        return $this->reference1;
    }

    public function setReference1(?string $reference1): self
    {
        $this->reference1 = $reference1;

        return $this;
    }

    public function getPhoneReference1(): ?string
    {
        return $this->phoneReference1;
    }

    public function setPhoneReference1(?string $phoneReference1): self
    {
        $this->phoneReference1 = $phoneReference1;

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

    public function getCoordinates(): ?string
    {
        return $this->coordinates;
    }

    public function setCoordinates(?string $coordinates): self
    {
        $this->coordinates = $coordinates;

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

    public function getIdDocidTypes(): ?DocidTypes
    {
        return $this->idDocidTypes;
    }

    public function setIdDocidTypes(?DocidTypes $idDocidTypes): self
    {
        $this->idDocidTypes = $idDocidTypes;

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
