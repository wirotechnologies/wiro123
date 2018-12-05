<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ContractsContractStatus
 *
 * @ORM\Table(name="contracts_contract_status", indexes={@ORM\Index(name="IDX_DC9B78694342C241", columns={"id_status_causes"}), @ORM\Index(name="IDX_DC9B7869AE1E43D9", columns={"id_contract_status"}), @ORM\Index(name="IDX_DC9B786989651554", columns={"id_contracts"})})
 * @ORM\Entity
 */
class ContractsContractStatus
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contracts_contract_status_id_seq", allocationSize=1, initialValue=1)
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
     * @var \ContractStatus
     *
     * @ORM\ManyToOne(targetEntity="ContractStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contract_status", referencedColumnName="id")
     * })
     */
    private $idContractStatus;

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
