<?php

namespace App\Form\PageParts;

use App\Entity\PageParts\RawHtmlPagePart;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RawHtmlPagePartAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder->add('content', TextareaType::class, [
            'label' => 'pagepart.html.content',
            'required' => true,
            'attr' => [
                'rows' => 5,
                'no-max-width' => true,
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RawHtmlPagePart::class,
        ]);
    }
}
