<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * SyCities
 *
 * @ORM\Table(name="sy_cities", uniqueConstraints={@ORM\UniqueConstraint(name="unique_city_name_state", columns={"name", "id_sy_states"})}, indexes={@ORM\Index(name="IDX_213AE89349909292", columns={"id_sy_states"})})
 * @ORM\Entity
 */
class SyCities
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sy_cities_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=true)
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
     * @var \SyStates
     *
     * @ORM\ManyToOne(targetEntity="SyStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sy_states", referencedColumnName="id")
     * })
     */
    private $idSyStates;


}
