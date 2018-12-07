<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Invoices
 *
 * @ORM\Table(name="invoices", indexes={@ORM\Index(name="IDX_6A2F2F953AB77F27", columns={"id_employees"})})
 * @ORM\Entity
 */
class Invoices
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="invoices_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="invoice_date", type="datetime", nullable=true)
     */
    private $invoiceDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="total_value", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $totalValue;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deadline_pay", type="datetime", nullable=true)
     */
    private $deadlinePay;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value_past_due", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $valuePastDue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="new_balance", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $newBalance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference_payment", type="decimal", precision=20, scale=0, nullable=true)
     */
    private $referencePayment;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="suspension_date", type="datetime", nullable=true)
     */
    private $suspensionDate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="accounts_number_past_due", type="smallint", nullable=true)
     */
    private $accountsNumberPastDue;

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


}
