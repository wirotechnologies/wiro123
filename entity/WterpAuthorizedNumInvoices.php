<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * WterpAuthorizedNumInvoices
 *
 * @ORM\Table(name="wterp_authorized_num_invoices")
 * @ORM\Entity
 */
class WterpAuthorizedNumInvoices
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="wterp_authorized_num_invoices_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_number", type="decimal", precision=12, scale=0, nullable=true)
     */
    private $firstNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_number", type="decimal", precision=12, scale=0, nullable=true)
     */
    private $lastNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="current_number", type="decimal", precision=12, scale=0, nullable=true)
     */
    private $currentNumber;

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


}
