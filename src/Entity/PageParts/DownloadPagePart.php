<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\MediaBundle\Entity\Media;

#[ORM\Entity]
#[ORM\Table(name: 'app_download_page_parts')]
class DownloadPagePart extends AbstractPagePart
{
    /**
     * @var Media|null
     */
    #[ORM\ManyToOne(targetEntity: Media::class)]
    #[ORM\JoinColumn(name: 'media_id', referencedColumnName: 'id')]
    protected $media;

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(?Media $media): DownloadPagePart
    {
        $this->media = $media;

        return $this;
    }

    public function getDefaultView(): string
    {
        return 'PageParts/DownloadPagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\DownloadPagePartAdminType::class;
    }
}
