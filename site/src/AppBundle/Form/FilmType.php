<?php
namespace AppBundle\Form;

use AppBundle\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ficheDescription' , FicheType::class)

            ->add('video', TextType::class)
            ->add('image', FileType::class, array('label' => 'Image(JPG)'))
            ->add('saga', NumberType::class)
            ->add('bandeAnnonce' , TextType::class)
            ->add('duree' , TimeType::class)
            ->add('date' , DateType::class)

            ->add('save',SubmitType::class , ['label' => 'Ajouter un Film'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Film::class
        ));
    }
}
