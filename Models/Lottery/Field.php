<?php declare(strict_types=1);

/**
 * Einrichtungshaus Ostermann GmbH & Co. KG - Lottery
 *
 * @package   OstLottery
 *
 * @author    Eike Brandt-Warneke <e.brandt-warneke@ostermann.de>
 * @copyright 2019 Einrichtungshaus Ostermann GmbH & Co. KG
 * @license   proprietary
 */

namespace OstLottery\Models\Lottery;

use Doctrine\ORM\Mapping as ORM;
use OstLottery\Models\Lottery;
use Shopware\Components\Model\ModelEntity;

/**
 * @ORM\Entity(repositoryClass="Repository")
 * @ORM\Table(name="ost_lotteries_fields")
 */
class Field extends ModelEntity
{
    /**
     * Auto-generated id.
     *
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * ...
     *
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * The name / the label of the field.
     *
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name;

    /**
     * The type of the input field. One of the following:
     * - text
     * - textarea
     * - checkbox
     * - radio
     *
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false, length=16)
     */
    private $type;

    /**
     * ...
     *
     * @var bool
     *
     * @ORM\Column(name="mandatory", type="boolean", nullable=false)
     */
    private $mandatory;

    /**
     * ...
     *
     * @var int
     *
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    private $position;

    /**
     * Optional values (for radio or checkbox).
     * Every option is split with a semicolon - e.g. "Ja;Nein;Vielleicht"
     *
     * @var string
     *
     * @ORM\Column(name="values", type="string", nullable=true)
     */
    private $values;

    /**
     * OWNING SIDE - BI DIRECTIONAL
     *
     * ...
     *
     * @var Lottery
     *
     * @ORM\ManyToOne(targetEntity="OstLottery\Models\Lottery", inversedBy="fields")
     * @ORM\JoinColumn(name="lotteryId", referencedColumnName="id")
     */
    private $lottery;

    /**
     * Getter method for the property.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Getter method for the property.
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Setter method for the property.
     *
     * @param bool $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Setter method for the property.
     *
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Setter method for the property.
     *
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * Getter method for the property.
     *
     * @return bool
     */
    public function getMandatory()
    {
        return $this->mandatory;
    }

    /**
     * Setter method for the property.
     *
     * @param bool $mandatory
     */
    public function setMandatory(bool $mandatory)
    {
        $this->mandatory = $mandatory;
    }

    /**
     * Getter method for the property.
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Setter method for the property.
     *
     * @param int $position
     */
    public function setPosition(int $position)
    {
        $this->position = $position;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * Setter method for the property.
     *
     * @param string $values
     */
    public function setValues(string $values)
    {
        $this->values = $values;
    }

    /**
     * Getter method for the property.
     *
     * @return Lottery
     */
    public function getLottery()
    {
        return $this->lottery;
    }

    /**
     * Setter method for the property.
     *
     * @param Lottery $lottery
     */
    public function setLottery(Lottery $lottery)
    {
        $this->lottery = $lottery;
    }
}
