<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Branches
 *
 * @ORM\Table(name="branches", indexes={@ORM\Index(name="IDX_D760D16F271161D", columns={"id_companies"})})
 * @ORM\Entity
 */
class Branches
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="branches_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=true)
     */
    private $name;

    /**
     * @var \Companies
     *
     * @ORM\ManyToOne(targetEntity="Companies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_companies", referencedColumnName="id")
     * })
     */
    private $idCompanies;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIdCompanies(): ?Companies
    {
        return $this->idCompanies;
    }

    public function setIdCompanies(?Companies $idCompanies): self
    {
        $this->idCompanies = $idCompanies;

        return $this;
    }


    public function __toString(){
        // to show the name of the Category in the select
        return $this->name;
        // to show the id of the Category in the select
        // return $this->id;
    }
    
    }
