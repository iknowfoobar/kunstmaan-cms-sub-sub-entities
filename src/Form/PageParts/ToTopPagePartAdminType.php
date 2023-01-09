<?php

namespace App\Form\PageParts;

use App\Entity\PageParts\ToTopPagePart;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ToTopPagePartAdminType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ToTopPagePart::class,
        ]);
    }
}
