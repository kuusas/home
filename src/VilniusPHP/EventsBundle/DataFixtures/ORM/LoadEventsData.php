<?php

namespace VilniusPHP\EventsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VilniusPHP\EventsBundle\Entity\Event;
use VilniusPHP\EventsBundle\Entity\Speaker;
use VilniusPHP\EventsBundle\Entity\Sponsor;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->loadEvent1($manager);
    }

    /**
     * Event 1 data.
     * 
     * @return void
     */
    protected function loadEvent1(ObjectManager $manager)
    {
        $event = new Event();
        $event->setName("#1 susitikimas");
        $event->setDate(new \DateTime("2013-01-03 18:30"));
        $event->setGithubUrl("https://github.com/vilniusphp/vilniusphp-meetups/tree/master/2012-12-06");

        $speaker1 = new Speaker();
        $speaker1->setName("Aurimas Baubkus");
        $speaker1->setTopic("Susirinkom. Kas toliau?");
        $speaker1->setLinkedInUrl("http://lt.linkedin.com/in/aurimasbaubkus");

        $speaker2 = new Speaker();
        $speaker2->setName("Povilas Korop");
        $speaker2->setTopic("Ar verta naudoti framework'us?");
        $speaker2->setLinkedInUrl("http://www.linkedin.com/pub/povilas-korop/54/5aa/473");

        $speaker3 = new Speaker();
        $speaker3->setName("Povilas Balzaravičius");
        $speaker3->setTopic("Seni projektai, nauji įrankiai");
        $speaker3->setLinkedInUrl("http://www.linkedin.com/in/pawka");

        $speaker4 = new Speaker();
        $speaker4->setName("Vaidas Zlotkus");
        $speaker4->setTopic("Dažniausiai sutinkamos esminės MySQL našumo problemos ir jų sprendimo būdai");
        $speaker4->setLinkedInUrl("http://www.linkedin.com/in/muanton");

        $event->addSpeaker($speaker1);
        $event->addSpeaker($speaker2);
        $event->addSpeaker($speaker3);
        $event->addSpeaker($speaker4);

        $sponsor = new Sponsor();
        $sponsor->setName("Estina");
        $sponsor->setUrl("http://www.estina.com/");
        $event->addSponsor($sponsor);

        $manager->persist($event);
        $manager->persist($speaker1);
        $manager->persist($speaker2);
        $manager->persist($speaker3);
        $manager->persist($speaker4);
        $manager->persist($sponsor);

        $manager->flush();
    }
}


