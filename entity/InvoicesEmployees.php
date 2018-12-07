<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * InvoicesEmployees
 *
 * @ORM\Table(name="invoices_employees", indexes={@ORM\Index(name="IDX_82440F933AB77F27", columns={"id_employees"}), @ORM\Index(name="IDX_82440F933AF4C300", columns={"id_invoices"}), @ORM\Index(name="IDX_82440F9375B0E2A7", columns={"id_events"})})
 * @ORM\Entity
 */
class InvoicesEmployees
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="invoices_employees_id_seq", allocationSize=1, initialValue=1)
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
     * @var \Invoices
     *
     * @ORM\ManyToOne(targetEntity="Invoices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_invoices", referencedColumnName="id")
     * })
     */
    private $idInvoices;

    /**
     * @var \Events
     *
     * @ORM\ManyToOne(targetEntity="Events")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_events", referencedColumnName="id")
     * })
     */
    private $idEvents;


}
