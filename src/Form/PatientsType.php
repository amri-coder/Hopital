<?php

namespace App\Form;

use App\Entity\Patients;
use Doctrine\Common\Annotations\Annotation\Required;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('lastname', TextType::class, ['label' => 'Nom : ', 'label_attr' => ['class' => 'form-label'], 'attr' => ['class' => 'form-control']])
            ->add('firstname', TextType::class, ['label' => 'Prénom : ', 'label_attr' => ['class' => 'form-label'], 'attr' => ['class' => 'form-control']])
            ->add('birthDate', BirthdayType::class, ['label' => 'Date de naissance : ', 'placeholder' => ['day' => 'Jour', 'month' => 'Mois', 'year' => 'Année'], 'label_attr' => ['class' => 'form-label'], 'attr' => ['class' => 'form-control']])
            ->add('email', EmailType::class, ['required' => false, 'label' => 'E-mail : ', 'label_attr' => ['class' => 'form-label'], 'attr' => ['class' => 'form-control']])
            ->add('vitalcardNumber', TextType::class, ['label' => 'Numéro carte vital : ', 'label_attr' => ['class' => 'form-label'], 'attr' => ['class' => 'form-control']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patients::class,
        ]);
    }
}
