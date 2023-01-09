<?php

namespace App\Entity\Pages;

use App\Form\Pages\ContentPageAdminType;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\MediaBundle\Entity\Media;
use Kunstmaan\NodeBundle\Entity\AbstractPage;
use Kunstmaan\NodeSearchBundle\Helper\SearchTypeInterface;
use Kunstmaan\PagePartBundle\Helper\HasPageTemplateInterface;

#[ORM\Entity()]
#[ORM\Table(name: 'app_content_pages')]
class ContentPage extends AbstractPage implements HasPageTemplateInterface, SearchTypeInterface
{

    public function getDefaultAdminType(): string
    {
        return ContentPageAdminType::class;
    }

    public function getPossibleChildTypes(): array
    {
        return [
            [
                'name' => 'ContentPage',
                'class' => 'App\Entity\Pages\ContentPage',
            ],
        ];
    }


    public function getSearchType(): string
    {
        return 'Page';
    }

    public function getPagePartAdminConfigurations(): array
    {
        return ['main'];
    }

    public function getPageTemplates(): array
    {
        return ['contentpage'];
    }

    public function getDefaultView(): string
    {
        return 'Pages/ContentPage/view.html.twig';
    }
}
