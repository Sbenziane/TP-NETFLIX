<?php
// src/AppBundle/Manager/ArticleManager.php
namespace AppBundle\Manager;
use AppBundle\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
class FilmManager
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }
    public function getArticles()
    {
        return $this->em->getRepository(Film:: class)
            ->findAll();
    }
    public function getArticle(int $id)
    {
        return $this->em->getRepository(Film:: class)
            ->find($id);
    }
    public function getCreateArticle(Film $film)
    {
        $this->em->persist($film);
        $this->em->flush();

        return $film;
    }
}
