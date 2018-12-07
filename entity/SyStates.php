<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * SyStates
 *
 * @ORM\Table(name="sy_states", uniqueConstraints={@ORM\UniqueConstraint(name="unique_state_name_country", columns={"name", "id_sy_countries"})}, indexes={@ORM\Index(name="IDX_C9A52EB57DDFAEA9", columns={"id_sy_countries"})})
 * @ORM\Entity
 */
class SyStates
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sy_states_id_seq", allocationSize=1, initialValue=1)
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
     * @var \SyCountries
     *
     * @ORM\ManyToOne(targetEntity="SyCountries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sy_countries", referencedColumnName="id")
     * })
     */
    private $idSyCountries;


}
