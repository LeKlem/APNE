<?php

namespace App\Form;

use App\Entity\Orders;
use PHPUnit\Util\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class OrdersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adress', TextType::class)
            ->add('postal_code', NumberType::class)
            ->add('city', TextType::class)
            ->add('card_number', NumberType::class, ['mapped' => false])
            ->add('owner_name', TextType::class,['mapped' => false])
            ->add('crypto', NumberType::class, ['mapped' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Orders::class,
        ]);
    }
}
