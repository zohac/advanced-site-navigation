<?php

namespace App\Form;

use App\Dto\HTMLNavElementDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HTMLNavElementType extends HTMLElementType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->buildHTMLElementForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HTMLNavElementDto::class,
        ]);
    }
}
