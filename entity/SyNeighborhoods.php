<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * SyNeighborhoods
 *
 * @ORM\Table(name="sy_neighborhoods", indexes={@ORM\Index(name="IDX_48924909A10F54B4", columns={"id_sy_cities"})})
 * @ORM\Entity
 */
class SyNeighborhoods
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sy_neighborhoods_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

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
     * @var \SyCities
     *
     * @ORM\ManyToOne(targetEntity="SyCities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sy_cities", referencedColumnName="id")
     * })
     */
    private $idSyCities;


}
