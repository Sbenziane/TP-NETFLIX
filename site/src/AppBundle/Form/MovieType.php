<?php
namespace AppBundle\Form;

use AppBundle\Entity\Movie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descriptionSheet' , FicheType::class)
            ->add('rating', NumberType::class)
            ->add('linkMovie', FileType::class , array('label' => 'Film'))
            ->add('linkImg',FileType::class , array('label' => 'Image(JPG)') )
          //  ->add('linkTrailer', FileType::class , array('label' => 'Bande annonce'))
            ->add('titleSaga', TextType::class)
            ->add('cover', TextType::class)

            ->add('save',SubmitType::class , ['label' => 'Ajouter un movie'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Movie::class
        ));
    }
}
