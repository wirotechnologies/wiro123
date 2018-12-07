<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @ORM\Table(name="customers", uniqueConstraints={@ORM\UniqueConstraint(name="unique_customer_email", columns={"email"}), @ORM\UniqueConstraint(name="unique_customer_docid", columns={"docid"})}, indexes={@ORM\Index(name="IDX_62534E2140D6C54", columns={"id_docid_types"})})
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


}
