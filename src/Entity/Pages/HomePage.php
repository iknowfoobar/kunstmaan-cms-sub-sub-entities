<?php

namespace App\Entity\Pages;

use App\Form\Pages\HomePageAdminType;
use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\NodeBundle\Entity\AbstractPage;
use Kunstmaan\NodeBundle\Entity\HomePageInterface;
use Kunstmaan\NodeSearchBundle\Helper\SearchTypeInterface;
use Kunstmaan\PagePartBundle\Helper\HasPageTemplateInterface;

#[ORM\Entity()]
#[ORM\Table(name: 'app_home_pages')]
class HomePage extends AbstractPage implements HasPageTemplateInterface, SearchTypeInterface, HomePageInterface
{
    public function getDefaultAdminType(): string
    {
        return HomePageAdminType::class;
    }

    public function getPossibleChildTypes(): array
    {
        return [
            [
                'name' => 'ContentPage',
                'class' => 'App\Entity\Pages\ContentPage',
            ],
            [
                'name' => 'BehatTestPage',
                'class' => 'App\Entity\Pages\BehatTestPage',
            ],
        ];
    }

    public function getPagePartAdminConfigurations(): array
    {
	    return ['main'];
    }

    public function getPageTemplates(): array
    {
        return ['homepage'];
    }

    public function getDefaultView(): string
    {
        return 'Pages/HomePage/view.html.twig';
    }

    public function getSearchType(): string
    {
        return 'Home';
    }
}
