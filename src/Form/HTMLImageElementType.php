<?php

namespace App\Form;

use App\Dto\HTMLImageElementDto;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HTMLImageElementType extends HTMLElementType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->buildHTMLElementForm($builder, $options);
        $builder
            ->add('crossOrigin', ChoiceType::class, [
                'choices'  => $this->getChoicesValues(HTMLImageElementDto::CROSS_ORIGIN),
                'placeholder' => 'Choose an option',
                'required' => false,
            ])
            ->add('decoding', ChoiceType::class, [
                'choices'  => $this->getChoicesValues(HTMLImageElementDto::DECODING),
                'placeholder' => 'Choose an option',
                'required' => false,
            ])
            ->add('height')
            ->add('width')
            ->add('loading', ChoiceType::class, [
                'choices'  => $this->getChoicesValues(HTMLImageElementDto::LOADING),
                'placeholder' => 'Choose an option',
                'required' => false,
            ])
            ->add('src')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => HTMLImageElementDto::class,
        ]);
    }
}
