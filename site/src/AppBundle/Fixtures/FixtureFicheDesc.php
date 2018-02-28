<?php

namespace AppBundle\Fixtures;

use AppBundle\Entity\FicheDescription;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FixtureFicheDesc extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $fiche = new FicheDescription();
        $fiche
            ->setTitre("MonTitre")
            ->setDescription("blablabla Ma description");

        $manager->persist($fiche);
        $manager->flush();
    }
}