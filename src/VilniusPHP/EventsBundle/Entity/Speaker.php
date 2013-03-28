<?php

namespace VilniusPHP\EventsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Speaker
 *
 * @ORM\Table(name="speaker")
 * @ORM\Entity
 */
class Speaker
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
     * @var string
     *
     * @ORM\Column(name="topic", type="string", length=255)
     */
    private $topic;

    /**
     * @var string
     *
     * @ORM\Column(name="linked_in_url", type="string", length=255)
     */
    private $linkedInUrl;

    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="speakers")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $event;

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
     * @return Speaker
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
     * Set topic
     *
     * @param string $topic
     * @return Speaker
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    
        return $this;
    }

    /**
     * Get topic
     *
     * @return string 
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set linkedInUrl
     *
     * @param string $linkedInUrl
     * @return Speaker
     */
    public function setLinkedInUrl($linkedInUrl)
    {
        $this->linkedInUrl = $linkedInUrl;
    
        return $this;
    }

    /**
     * Get linkedInUrl
     *
     * @return string 
     */
    public function getLinkedInUrl()
    {
        return $this->linkedInUrl;
    }

    /**
     * Get event 
     * 
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set event 
     * 
     * @param Event $event 
     *
     * @return Speaker
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }
}
