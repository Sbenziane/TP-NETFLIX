<?php
namespace AppBundle\Form;

use  Symfony\Component\Form\AbstractType;
use  Symfony\Component\Form\Extension\Core\Type\SubmitType;
use  Symfony\Component\Form\Extension\Core\Type\TextType;
use  Symfony\Component\Form\FormBuilderInterface;
use  Symfony\Bridge\Doctrine\Form\Type\EntityType;


class GenreType extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('label', TextType::class)
      ->add('save', SubmitType::class);
    }
  }
