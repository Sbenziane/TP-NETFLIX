<?php
namespace AppBundle\Form;

use  Symfony\Component\Form\AbstractType;
use  Symfony\Component\Form\Extension\Core\Type\MoneyType;
use  Symfony\Component\Form\Extension\Core\Type\NumberType;
use  Symfony\Component\Form\Extension\Core\Type\SubmitType;
use  Symfony\Component\Form\Extension\Core\Type\TextareaType;
use  Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use  Symfony\Component\Form\FormBuilderInterface;
use  Symfony\Bridge\Doctrine\Form\Type\EntityType;


class UserType extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('lastName', TextType::class)
      ->add('firstName', TextType::class)
      ->add('username', TextType::class)
      ->add('email', TextType::class)
      ->add('password', TextType::class)
      ->add('birthday', DateType::class)
      ->add('country', TextType::class)
      ->add('save', SubmitType::class);
    }
  }
