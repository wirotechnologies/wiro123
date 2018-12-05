<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * CustomersAddress
 *
 * @ORM\Table(name="customers_address", indexes={@ORM\Index(name="IDX_3106BC64E266F206", columns={"id_customers"}), @ORM\Index(name="IDX_3106BC64EFFFC931", columns={"id_addresses"})})
 * @ORM\Entity
 */
class CustomersAddress
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="customers_address_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="active", type="boolean", nullable=true, options={"default"="1"})
     */
    private $active = true;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="start_active", type="datetime", nullable=true)
     */
    private $startActive;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="end_active", type="datetime", nullable=true)
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
     * @var \Customers
     *
     * @ORM\ManyToOne(targetEntity="Customers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_customers", referencedColumnName="id")
     * })
     */
    private $idCustomers;

    /**
     * @var \Addresses
     *
     * @ORM\ManyToOne(targetEntity="Addresses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_addresses", referencedColumnName="id")
     * })
     */
    private $idAddresses;


}
