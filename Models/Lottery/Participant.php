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

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use OstLottery\Models\Lottery;
use Shopware\Components\Model\ModelEntity;

/**
 * @ORM\Entity(repositoryClass="Repository")
 * @ORM\Table(name="ost_lotteries_participants")
 */
class Participant extends ModelEntity
{
    /**
     * OWNING SIDE - UNI DIRECTIONAL
     *
     * The language sub-shop.
     *
     * @var \Shopware\Models\Shop\Shop
     *
     * @ORM\ManyToOne(targetEntity="Shopware\Models\Shop\Shop")
     * @ORM\JoinColumn(name="shopId", referencedColumnName="id")
     */
    protected $shop;
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
     * @var \DateTime
     *
     * @ORM\Column(name="`date`", type="datetime", nullable=false)
     */
    private $date;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="email", type="string", nullable=false)
     */
    private $email;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="salutation", type="string", nullable=false, length=8)
     */
    private $salutation;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", nullable=false)
     */
    private $firstname;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", nullable=false)
     */
    private $lastname;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="street", type="string", nullable=true)
     */
    private $street;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="zip", type="string", nullable=true)
     */
    private $zip;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="city", type="string", nullable=true)
     */
    private $city;

    /**
     * ...
     *
     * @var int
     *
     * @ORM\Column(name="countryId", type="integer", nullable=true)
     */
    private $countryId;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="phone", type="string", nullable=true, length=32)
     */
    private $phone;

    /**
     * An optional input for every field question.
     *
     * @var string
     *
     * @ORM\Column(name="answer", type="text", nullable=true)
     */
    private $input;

    /**
     * OWNING SIDE - BI DIRECTIONAL
     *
     * ...
     *
     * @var Lottery
     *
     * @ORM\ManyToOne(targetEntity="OstLottery\Models\Lottery", inversedBy="participants")
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
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Setter method for the property.
     *
     * @param DateTime $date
     */
    public function setDate(DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Setter method for the property.
     *
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * Setter method for the property.
     *
     * @param string $salutation
     */
    public function setSalutation(string $salutation)
    {
        $this->salutation = $salutation;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Setter method for the property.
     *
     * @param string $firstname
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Setter method for the property.
     *
     * @param string $lastname
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Setter method for the property.
     *
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Setter method for the property.
     *
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Setter method for the property.
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Getter method for the property.
     *
     * @return int
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * Setter method for the property.
     *
     * @param int $countryId
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Setter method for the property.
     *
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Setter method for the property.
     *
     * @param string $input
     */
    public function setInput($input)
    {
        $this->input = $input;
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

    /**
     * Getter method for the property.
     *
     * @return \Shopware\Models\Shop\Shop
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * Setter method for the property.
     *
     * @param \Shopware\Models\Shop\Shop $shop
     */
    public function setShop(\Shopware\Models\Shop\Shop $shop)
    {
        $this->shop = $shop;
    }
}
