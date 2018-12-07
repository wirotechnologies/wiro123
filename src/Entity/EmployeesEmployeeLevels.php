<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmployeesEmployeeLevels
 *
 * @ORM\Table(name="employees_employee_levels", indexes={@ORM\Index(name="IDX_A190238E5F456304", columns={"id_employee_levels"}), @ORM\Index(name="IDX_A190238E3AB77F27", columns={"id_employees"})})
 * @ORM\Entity
 */
class EmployeesEmployeeLevels
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="employees_employee_levels_id_seq", allocationSize=1, initialValue=1)
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
     * @var \EmployeeLevels
     *
     * @ORM\ManyToOne(targetEntity="EmployeeLevels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_employee_levels", referencedColumnName="id")
     * })
     */
    private $idEmployeeLevels;

    /**
     * @var \Employees
     *
     * @ORM\ManyToOne(targetEntity="Employees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_employees", referencedColumnName="id")
     * })
     */
    private $idEmployees;

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

    public function getIdEmployeeLevels(): ?EmployeeLevels
    {
        return $this->idEmployeeLevels;
    }

    public function setIdEmployeeLevels(?EmployeeLevels $idEmployeeLevels): self
    {
        $this->idEmployeeLevels = $idEmployeeLevels;

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


}
