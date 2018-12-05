<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ProductContractDiscountsEmployees
 *
 * @ORM\Table(name="product_contract_discounts_employees", indexes={@ORM\Index(name="IDX_C5C0A12D5BB31A84", columns={"id_product_contract_discounts"}), @ORM\Index(name="IDX_C5C0A12D3AB77F27", columns={"id_employees"}), @ORM\Index(name="IDX_C5C0A12D75B0E2A7", columns={"id_events"})})
 * @ORM\Entity
 */
class ProductContractDiscountsEmployees
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="product_contract_discounts_employees_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * @var \ProductContractDiscounts
     *
     * @ORM\ManyToOne(targetEntity="ProductContractDiscounts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_product_contract_discounts", referencedColumnName="id")
     * })
     */
    private $idProductContractDiscounts;

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
     * @var \Events
     *
     * @ORM\ManyToOne(targetEntity="Events")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_events", referencedColumnName="id")
     * })
     */
    private $idEvents;


}
