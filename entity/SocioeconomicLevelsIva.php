<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * SocioeconomicLevelsIva
 *
 * @ORM\Table(name="socioeconomic_levels_iva")
 * @ORM\Entity
 */
class SocioeconomicLevelsIva
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="socioeconomic_levels_iva_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iva", type="decimal", precision=3, scale=2, nullable=true)
     */
    private $iva;

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
