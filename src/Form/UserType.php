<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType /* Formulaire de la page de création d'utilisateur */
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add("email", TextType::class, [
            "label" => "Email:",
            "attr" => [
                "placeholder" => "exemple@exemple.com"
            ]
        ]);
        $builder->add("password", RepeatedType::class, [
                "label" => "Mot de passe:",
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe:', 'attr' => ["placeholder" => "********"]],
                'second_options' => ['label' => 'Confirmer le mot de passe:', 'attr' => ["placeholder" => "********"]]
        ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User ::class
        ]);
    }
}