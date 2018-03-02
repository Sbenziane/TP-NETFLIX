<?php
// src/AppBundle/Manager/ArticleManager.php
namespace AppBundle\Manager;
use AppBundle\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
class MovieManager
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
        return $this->em->getRepository(Movie:: class)
            ->findAll();
    }
    public function getArticle(int $id)
    {
        return $this->em->getRepository(Movie:: class)
            ->find($id);
    }
    public function getCreateArticle(Movie $movie)
    {
        $this->em->persist($movie);
        $this->em->flush();

        return $movie;
    }
}