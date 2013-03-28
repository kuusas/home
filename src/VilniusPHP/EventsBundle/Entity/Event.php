<?php

namespace VilniusPHP\EventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_url", type="string", length=255, nullable=true)
     */
    private $facebookUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="github_url", type="string", length=255, nullable=true)
     */
    private $githubUrl;

    /**
     * @ORM\ManyToMany(targetEntity="Sponsor", mappedBy="events")
     */
    private $sponsors;

    /**
     * @ORM\OneToMany(targetEntity="Speaker", mappedBy="event")
     */
    private $speakers;

    /**
     * __construct 
     * 
     * @return void
     */
    public function __construct()
    {
        $this->sponsors = new ArrayCollection();
        $this->speakers = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set facebookUrl
     *
     * @param string $facebookUrl
     * @return Event
     */
    public function setFacebookUrl($facebookUrl)
    {
        $this->facebookUrl = $facebookUrl;
    
        return $this;
    }

    /**
     * Get facebookUrl
     *
     * @return string 
     */
    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

    /**
     * Set githubUrl
     *
     * @param string $githubUrl
     * @return Event
     */
    public function setGithubUrl($githubUrl)
    {
        $this->githubUrl = $githubUrl;
    
        return $this;
    }

    /**
     * Get githubUrl
     *
     * @return string 
     */
    public function getGithubUrl()
    {
        return $this->githubUrl;
    }

    /**
     * Get sponsors 
     * 
     * @return ArrayCollection
     */
    public function getSponsors()
    {
        return $this->sponsors;
    }

    /**
     * Get speakers
     * 
     * @return ArrayCollection
     */
    public function getSpeakers()
    {
        return $this->speakers;
    }

    /**
     * Add speaker 
     * 
     * @param Speaker $speaker 
     *
     * @return Event
     */
    public function addSpeaker(Speaker $speaker)
    {
        $this->speakers[] = $speaker;
        $speaker->setEvent($this);

        return $this;
    }

    /**
     * Add sponsor 
     * 
     * @param Sponsor $sponsor 
     *
     * @return Event
     */
    public function addSponsor(Sponsor $sponsor)
    {
        $this->sponsors[] = $sponsor;
        $sponsor->getEvents()->add($this);

        return $this;
    }
}
