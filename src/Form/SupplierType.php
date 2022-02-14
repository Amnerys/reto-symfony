<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class SupplierType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('name',TextType::class,array('label'=>'Nombre'))
            ->add('email',EmailType::class,array('label'=>'Correo electrónico'))
            ->add('phone',TextType::class,array('label'=>'Teléfono'))
            //->add('type',TextType::class,array('label'=>'Tipo de proveedor'))
            ->add('type',ChoiceType::class,array(
                'label'=>'Activo',
                'choices'=>array(
                    'Hotel'=>'hotel',
                    'Pista'=>'pista',
                    'Complemento'=>'complemento'
                )))
            ->add('active',ChoiceType::class,array(
                'label'=>'Activo',
                'choices'=>array(
                    'Sí'=>'si',
                    'No'=>'no'
                )))
            ->add('submit',SubmitType::class,array('label'=>'Guardar'));
    }

}