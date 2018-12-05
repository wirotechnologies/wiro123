<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Contracts
 *
 * @ORM\Table(name="contracts", uniqueConstraints={@ORM\UniqueConstraint(name="number_unique", columns={"number"})}, indexes={@ORM\Index(name="IDX_950A9732757A812", columns={"id_contract_types"}), @ORM\Index(name="IDX_950A973E266F206", columns={"id_customers"}), @ORM\Index(name="IDX_950A973BA3D72F6", columns={"id_recurrence"})})
 * @ORM\Entity
 */
class Contracts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contracts_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     */
    private $number;

    /**
     * @var int|null
     *
     * @ORM\Column(name="past_due_days", type="integer", nullable=true)
     */
    private $pastDueDays;

    /**
     * @var string|null
     *
     * @ORM\Column(name="balance", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $balance;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="start", type="datetime", nullable=true)
     */
    private $start;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_payment", type="datetime", nullable=true)
     */
    private $lastPayment;

    /**
     * @var int|null
     *
     * @ORM\Column(name="last_invoice", type="integer", nullable=true)
     */
    private $lastInvoice;

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
     * @var \ContractTypes
     *
     * @ORM\ManyToOne(targetEntity="ContractTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contract_types", referencedColumnName="id")
     * })
     */
    private $idContractTypes;

    /**
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_customers", referencedColumnName="id")
     * })
     */
    private $idCustomers;

    /**
     * @var \Recurrence
     *
     * @ORM\ManyToOne(targetEntity="Recurrence")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_recurrence", referencedColumnName="id")
     * })
     */
    private $idRecurrence;


}
