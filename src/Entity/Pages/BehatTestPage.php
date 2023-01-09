<?php

namespace App\Entity\Pages;

use App\Form\Pages\BehatTestPageAdminType;
use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\NodeBundle\Entity\AbstractPage;
use Kunstmaan\PagePartBundle\Helper\HasPageTemplateInterface;

#[ORM\Entity()]
#[ORM\Table(name: 'app_behat_test_pages')]
class BehatTestPage extends AbstractPage implements HasPageTemplateInterface
{
    public function getDefaultAdminType(): string
    {
        return BehatTestPageAdminType::class;
    }

    public function getPossibleChildTypes(): array
    {
        return [
            [
                'name' => 'HomePage',
                'class' => 'App\Entity\Pages\HomePage',
            ],
            [
                'name' => 'ContentPage',
                'class' => 'App\Entity\Pages\ContentPage',
            ],
        ];
    }

    public function getPagePartAdminConfigurations(): array
    {
        return [];
    }

    public function getPageTemplates(): array
    {
        return ['behat-test-page'];
    }

    public function getDefaultView(): string
    {
        return '';
    }
}
