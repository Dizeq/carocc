<?php

namespace App\Form;

use App\Entity\Cars;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CarType extends ApplicationType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque', TextType::class, [
                'label' => "Marque",
                'attr' => [
                    'placeholder'=>'Marque de la voiture'
                ]
            ])
            ->add('modele', TextType::class, [
                'label' => "Modèle",
                'attr' => [
                    'placeholder'=>'Modèle de la voiture'
                ]
            ])
            ->add('kilometre', IntegerType::class, $this->getConfiguration('Kilomètre','Kilomètres au compteur'))
            ->add('prix', MoneyType::class, $this->getConfiguration('Prix de vente','indiquer le prix de vente de la voiture'))
            ->add('proprietaire', IntegerType::class, $this->getConfiguration('Propriétaire(s)','Nombre de propriétaires précédent'))
            ->add('cylindree', IntegerType::class, $this->getConfiguration('Cylindrée','cylindrée en cm³'))
            ->add('puissance', IntegerType::class, $this->getConfiguration('Puissance','puissance en cheveaux'))
            ->add('carburant', TextType::class, [
                'label' => "Carburant",
                'attr' => [
                    'placeholder'=>'Carburant de la voiture'
                ]
            ])
            ->add('mecirculation')
            ->add('transmission', TextType::class, [
                'label' => "Transmission",
                'attr' => [
                    'placeholder'=>'Transmission de la voiture'
                ]
            ])
            ->add('description', TextareaType::class, $this->getConfiguration('Description','Petite déscription de la voiture...'))
            ->add('options', TextareaType::class, $this->getConfiguration('Options','Options de la voiture...'))
            ->add('slug', TextType::class, $this->getConfiguration('Slug','Adresse web (automatique)',[
                'required' => false
            ]))
            ->add('cover_image', UrlType::class, $this->getConfiguration('URL de l\'image','Donnez l\'adresse de votre image'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cars::class,
        ]);
    }
}
