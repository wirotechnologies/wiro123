<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * SocioeconomicLevels
 *
 * @ORM\Table(name="socioeconomic_levels", uniqueConstraints={@ORM\UniqueConstraint(name="unique_socioeconomic_level_name", columns={"name"})}, indexes={@ORM\Index(name="IDX_34196D4B6B575F38", columns={"id_socioeconomic_levels_iva"})})
 * @ORM\Entity
 */
class SocioeconomicLevels
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="socioeconomic_levels_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=258, nullable=true)
     */
    private $description;

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
     * @var \SocioeconomicLevelsIva
     *
     * @ORM\ManyToOne(targetEntity="SocioeconomicLevelsIva")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_socioeconomic_levels_iva", referencedColumnName="id")
     * })
     */
    private $idSocioeconomicLevelsIva;


}
