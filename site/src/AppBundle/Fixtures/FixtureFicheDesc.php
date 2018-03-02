<?php

namespace AppBundle\Fixtures;

use AppBundle\Entity\DescriptionSheet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FixtureFicheDesc extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $fiche = new DescriptionSheet();
        $fiche
            ->setTitle("MonTitre")
            ->setReleaseAt( new \DateTime ('2018-01-01'))
            ->setLanguage( "Français")
            ->setDuration( new \DateTime ('00:02:00'))
            ->setDescription("blablabla Ma description");

        $manager->persist($fiche);
        $manager->flush();
    }
}