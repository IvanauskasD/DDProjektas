<?php
namespace App\Form;

use App\Entity\Car;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maker', ChoiceType::class, array(
                'choices' => array(
                    'BMW' => 'BMW',
                    'Ford' => 'Ford'),
                    'label' => 'maker'
            ))
            ->add('model', TextType::class, array(
                'label' => 'Model'
            ))
            ->add('service', ChoiceType::class, array(
                'choices' => array(
                    'Tire replacement' => 'Tire replacement',
                    'Brakes replacement' => 'Brakes replacement'),
                'label' => 'service'
            ))
            ->add('carYear', ChoiceType::class, array(
                'choices' => array(
                    '2000' => '2000',
                    '2011' => '2011'),
                'label' => 'carYear'
            ))
            ->add('transmission', ChoiceType::class, array(
                'choices' => array(
                    'Manual' => 'Manual',
                    'Auto' => 'Auto'),
                'label' => 'transmission'
            ))
            ->add('engineVolume', TextType::class, array(
                'label' => 'engineVolume'
            ))
            ->add('city', TextType::class, array(
                'label' => 'city'
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'Save car'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Car::class,
        ));
    }
}