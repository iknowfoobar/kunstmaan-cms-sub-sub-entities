<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'app_to_top_page_parts')]
class ToTopPagePart extends AbstractPagePart
{
    public function getDefaultView(): string
    {
        return 'PageParts/ToTopPagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\ToTopPagePartAdminType::class;
    }
}
