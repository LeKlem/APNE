<?php

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
class TicketFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Motif', ChoiceType::class, [
            'choices'  => [
                'Suivi de commande' => 'Suivi de commande',
                'Aide au passage de la commande' => 'Aide au passage de la commande',
                'Retour / remboursement' => 'Retour / remboursement',
                'Demande d\'information' => 'Demande d\'information',
            ],
        ])
            ->add('Message', TextareaType::class, [
                'attr' => ['class' => 'form-control ticketarea'],
            ]);
    }
}
