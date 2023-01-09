<?php

namespace App\Entity\PageParts;

use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\MediaBundle\Entity\Media;

#[ORM\Entity]
#[ORM\Table(name: 'app_audio_page_parts')]
class AudioPagePart extends AbstractPagePart
{
    /**
     * @var Media|null
     */
    #[ORM\ManyToOne(targetEntity: Media::class)]
    protected $media;

    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(?Media $media): AudioPagePart
    {
        $this->media = $media;

        return $this;
    }

    public function getDefaultView(): string
    {
        return 'PageParts/AudioPagePart/view.html.twig';
    }

    public function getDefaultAdminType(): string
    {
        return \App\Form\PageParts\AudioPagePartAdminType::class;
    }
}
