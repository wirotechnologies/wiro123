<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ContractAddress
 *
 * @ORM\Table(name="contract_address", indexes={@ORM\Index(name="IDX_51F1249EFFFC931", columns={"id_addresses"}), @ORM\Index(name="IDX_51F124989651554", columns={"id_contracts"})})
 * @ORM\Entity
 */
class ContractAddress
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contract_address_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="active", type="boolean", nullable=true, options={"default"="1"})
     */
    private $active = true;

    /**
     * @var int|null
     *
     * @ORM\Column(name="start_active", type="smallint", nullable=true)
     */
    private $startActive;

    /**
     * @var int|null
     *
     * @ORM\Column(name="end_active", type="smallint", nullable=true)
     */
    private $endActive;

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
     * @var \Addresses
     *
     * @ORM\ManyToOne(targetEntity="Addresses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_addresses", referencedColumnName="id")
     * })
     */
    private $idAddresses;

    /**
     * @var \Contracts
     *
     * @ORM\ManyToOne(targetEntity="Contracts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contracts", referencedColumnName="id")
     * })
     */
    private $idContracts;


}
