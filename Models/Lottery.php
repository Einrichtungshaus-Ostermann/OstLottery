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

namespace OstLottery\Models;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Shopware\Components\Model\ModelEntity;

/**
 * @ORM\Entity(repositoryClass="Repository")
 * @ORM\Table(name="ost_lotteries")
 */
class Lottery extends ModelEntity
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
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="banner", type="string", nullable=false)
     */
    private $banner;

    /**
     * ...
     *
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime", nullable=false)
     */
    private $startDate;

    /**
     * ...
     *
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime", nullable=false)
     */
    private $endDate;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="emailSenderName", type="string", nullable=false)
     */
    private $emailSenderName;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="emailSenderAddress", type="string", nullable=false)
     */
    private $emailSenderAddress;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="emailSubject", type="string", nullable=false)
     */
    private $emailSubject;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="emailTemplate", type="text", nullable=false)
     */
    private $emailTemplate;

    /**
     * ...
     *
     * @var string
     *
     * @ORM\Column(name="finishContent", type="text", nullable=false)
     */
    private $finishContent;

    /**
     * INVERSE SIDE - BI DIRECTIONAL
     *
     * ...
     *
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="OstLottery\Models\Lottery\Field", mappedBy="lottery", orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $fields;

    /**
     * INVERSE SIDE - BI DIRECTIONAL
     *
     * ...
     *
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="OstLottery\Models\Lottery\Participant", mappedBy="lottery", orphanRemoval=true)
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $participants;

    /**
     * ...
     */
    public function __construct()
    {
        // set defaults
        $this->fields = new ArrayCollection();
        $this->participants = new ArrayCollection();
    }

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
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * Setter method for the property.
     *
     * @param string $banner
     */
    public function setBanner(string $banner)
    {
        $this->banner = $banner;
    }

    /**
     * Getter method for the property.
     *
     * @return DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Setter method for the property.
     *
     * @param DateTime $startDate
     */
    public function setStartDate(DateTime $startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * Getter method for the property.
     *
     * @return DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Setter method for the property.
     *
     * @param DateTime $endDate
     */
    public function setEndDate(DateTime $endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getEmailSenderName()
    {
        return $this->emailSenderName;
    }

    /**
     * Setter method for the property.
     *
     * @param string $emailSenderName
     */
    public function setEmailSenderName(string $emailSenderName)
    {
        $this->emailSenderName = $emailSenderName;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getEmailSenderAddress()
    {
        return $this->emailSenderAddress;
    }

    /**
     * Setter method for the property.
     *
     * @param string $emailSenderAddress
     */
    public function setEmailSenderAddress(string $emailSenderAddress)
    {
        $this->emailSenderAddress = $emailSenderAddress;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getEmailSubject()
    {
        return $this->emailSubject;
    }

    /**
     * Setter method for the property.
     *
     * @param string $emailSubject
     */
    public function setEmailSubject(string $emailSubject)
    {
        $this->emailSubject = $emailSubject;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getEmailTemplate()
    {
        return $this->emailTemplate;
    }

    /**
     * Setter method for the property.
     *
     * @param string $emailTemplate
     */
    public function setEmailTemplate(string $emailTemplate)
    {
        $this->emailTemplate = $emailTemplate;
    }

    /**
     * Getter method for the property.
     *
     * @return string
     */
    public function getFinishContent()
    {
        return $this->finishContent;
    }

    /**
     * Setter method for the property.
     *
     * @param string $finishContent
     */
    public function setFinishContent(string $finishContent)
    {
        $this->finishContent = $finishContent;
    }

    /**
     * Getter method for the property.
     *
     * @return ArrayCollection
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Setter method for the property.
     *
     * @param ArrayCollection $fields
     */
    public function setFields(ArrayCollection $fields)
    {
        $this->fields = $fields;
    }

    /**
     * Getter method for the property.
     *
     * @return ArrayCollection
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Setter method for the property.
     *
     * @param ArrayCollection $participants
     */
    public function setParticipants(ArrayCollection $participants)
    {
        $this->participants = $participants;
    }
}
