<?php
namespace AppBundle\Form;

use  Symfony\Component\Form\AbstractType;
use  AppBundle\Entity\Genre;
use  AppBundle\Entity\Director;
use  Symfony\Component\Form\Extension\Core\Type\MoneyType;
use  Symfony\Component\Form\Extension\Core\Type\NumberType;
use  Symfony\Component\Form\Extension\Core\Type\SubmitType;
use  Symfony\Component\Form\Extension\Core\Type\TextareaType;
use  Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use  Symfony\Component\Form\FormBuilderInterface;
use  Symfony\Bridge\Doctrine\Form\Type\EntityType;


class MovieType extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name', TextType::class)
      ->add('description', TextareaType::class)
      ->add('release_at', DateType::class)
      ->add('language', TextType::class)
      ->add('length', TimeType::class)
      ->add('rating', NumberType::class)
      ->add('genre', EntityType::class, [
          'class' => Genre::class,
          'choice_label' => 'label'
      ])
      ->add('link', TextType::class)
      ->add('cover', TextType::class)
      ->add('director', EntityType::class, [
          'class' => Director::class,
          'choice_label' => 'lastName'
      ])
      ->add('save', SubmitType::class);
    }
  }
