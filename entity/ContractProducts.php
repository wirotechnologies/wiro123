<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ContractProducts
 *
 * @ORM\Table(name="contract_products", indexes={@ORM\Index(name="IDX_260D41A5E361B6CF", columns={"id_products"}), @ORM\Index(name="IDX_260D41A589651554", columns={"id_contracts"})})
 * @ORM\Entity
 */
class ContractProducts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contract_products_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deactivation", type="datetime", nullable=true)
     */
    private $deactivation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cut_day", type="smallint", nullable=true)
     */
    private $cutDay;

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
     * @var \Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_products", referencedColumnName="id")
     * })
     */
    private $idProducts;

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
