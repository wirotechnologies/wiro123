<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Discounts
 *
 * @ORM\Table(name="discounts", indexes={@ORM\Index(name="IDX_FC5702B83AB77F27", columns={"id_employees"})})
 * @ORM\Entity
 */
class Discounts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="discounts_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $value;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="discount_created_date", type="datetime", nullable=true)
     */
    private $discountCreatedDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="end_discount", type="datetime", nullable=true)
     */
    private $endDiscount;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="percentage", type="boolean", nullable=true)
     */
    private $percentage = false;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=true)
     */
    private $name;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="valid_until", type="datetime", nullable=true)
     */
    private $validUntil;

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
