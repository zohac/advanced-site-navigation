<?php

namespace App\Form;

use App\Dto\HTMLElementDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

abstract class HTMLElementType extends AbstractType
{
    public function buildHTMLElementForm(FormBuilderInterface $builder, array $options): FormBuilderInterface
    {
        $builder
            ->add('accessKey')
            ->add('autoCapitalize', ChoiceType::class, [
                'choices' => $this->getChoicesValues(HTMLElementDto::AUTO_CAPITALIZE),
                'placeholder' => 'Choose an option',
                'required' => false,
            ])
            ->add('class')
            ->add('contentEditable')
            ->add('dir', ChoiceType::class, [
                'choices' => $this->getChoicesValues(HTMLElementDto::DIR),
                'placeholder' => 'Choose an option',
                'required' => false,
            ])
            ->add('draggable')
            ->add('dropzone', ChoiceType::class, [
                'choices' => $this->getChoicesValues(HTMLElementDto::DROPZONE),
                'placeholder' => 'Choose an option',
                'required' => false,
            ])
            ->add('hidden')
            ->add('data')
            ->add('uid')
            ->add('itemId')
            ->add('itemProp')
            ->add('itemRef')
            ->add('itemScope')
            ->add('itemType')
            ->add('lang')
            ->add('style')
            ->add('tabIndex')
            ->add('title')
        ;

        return $builder;
    }

    /**
     * @param string[] $array
     * @return string[]
     */
    public function getChoicesValues(array $array): array
    {
        $returnArray = [];

        foreach ($array as $value) {
            $returnArray[$value] = $value;
        }

        return $returnArray;
    }
}
