<?php
namespace AppBundle\EventListener;

use AppBundle\Entity\Movie;
use AppBundle\VideoUpload;
use AppBundle\Entity\DescriptionSheet;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;


class MovieUploadListener
{
    private $uploader;

    public function __construct(VideoUpload $uploader)
    {
        $this->uploader = $uploader;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    private function uploadFile($entity)
    {
        if (!$entity instanceof Movie) {
            return;
        }
        $file = $entity->getLinkMovie();

        if (!$file instanceof UploadedFile) {
            return;
        }

        $fileName = $this->uploader->upload($file);
        $entity->setLinkMovie($fileName);
    }
}