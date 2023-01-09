<?php

namespace App\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\TwoColImageText;
use Kunstmaan\MediaBundle\Entity\Media;
use Kunstmaan\AdminBundle\Entity\AbstractEntity;

#[ORM\Table(name: 'srnr_two_col_image_text_images')]
#[ORM\Entity(repositoryClass: EntityRepository::class)]
class TwoColImageTextImage extends AbstractEntity
{
    #[ORM\ManyToOne(targetEntity: Media::class)]
    #[ORM\JoinColumn(name: 'image_id', referencedColumnName: 'id')]
    private $image;

    #[ORM\Column(name: 'image_alt_text', type: 'text', nullable: true)]
    private $imageAltText;

    #[ORM\Column(name: 'caption', type: 'string', nullable: true)]
    private $caption;

    #[ORM\ManyToOne(targetEntity: TwoColImageText::class, inversedBy: 'images')]
    #[ORM\JoinColumn(name: 'two_col_image_text_images_id', referencedColumnName: 'id')]
    private $twoColImageText;

    #[ORM\Column(name: 'display_order', type: 'integer', nullable: true)]
    private $displayOrder;

    public function setImage(Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImageAltText($imageAltText = null)
    {
        $this->imageAltText = $imageAltText;

        return $this;
    }

    public function getImageAltText()
    {
        return $this->imageAltText;
    }

    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    public function getCaption()
    {
        return $this->caption;
    }

    public function getTwoColImageText()
    {
        return $this->twoColImageText;
    }

    public function setTwoColImageText(TwoColImageText $twoColImageText): self
    {
        $this->twoColImageText = $twoColImageText;

        return $this;
    }

    public function setDisplayOrder($displayOrder)
    {
        $this->displayOrder = $displayOrder;

        return $this;
    }

    public function getDisplayOrder()
    {
        return $this->displayOrder;
    }
}
