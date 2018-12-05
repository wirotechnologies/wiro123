<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentReceipts
 *
 * @ORM\Table(name="payment_receipts")
 * @ORM\Entity
 */
class PaymentReceipts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="payment_receipts_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="transaction_number", type="string", length=48, nullable=true)
     */
    private $transactionNumber;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="receipt_date", type="datetime", nullable=true)
     */
    private $receiptDate;

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
