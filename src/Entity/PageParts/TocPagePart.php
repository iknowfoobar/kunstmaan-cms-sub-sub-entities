<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'app_toc_page_parts')]
class TocPagePart extends AbstractPagePart
{
    public function getDefaultView(): string
    {
        return 'PageParts/TocPagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\TocPagePartAdminType::class;
    }
}
