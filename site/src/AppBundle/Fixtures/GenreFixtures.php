<?php
namespace AppBundle\Fixtures;

use AppBundle\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GenreFixtures extends Fixture
{

	public function __construct()
	{
	}

	public function load(ObjectManager $manager)
	{
	$genres = ["Action","Animation","Aventure","Biographique","Catastrophe","Comédie","Comédie Dramatique","Comédie Musicale","Comédie Policière","Comédie Romantique","Court Métrage",
"Dessin Animé","Documentaire","Drame","Drame Psychologique","Epouvante","Espionnage","Essai","Fantastique","Film à Sketches","Film Musical","Guerre","Historique","Horreur",
"Karaté","Manga","Mélodrame","Muet","Par Parties","Péplum","Policier","Politique","Programme","Romance","Science Fiction","Sérial","Spectacle","Téléfilm","Théâtre","Thriller","Western"];
  foreach ($genres as $genreLabel) {
		$genre = new Genre();
		$genre
			->setLabel($genreLabel);
		$manager->persist($genre);
  }



	$manager->flush();
	}
}
