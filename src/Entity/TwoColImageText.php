<?php

namespace App\Entity;

use App\Entity\PageParts\TwoColImageTextPagePart;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Kunstmaan\AdminBundle\Entity\AbstractEntity;

#[ORM\Entity(repositoryClass: EntityRepository::class)]
#[ORM\Table(name: 'app_two_col_image_texts')]
class TwoColImageText extends AbstractEntity
{
    #[ORM\Column(name: 'title', type: 'string', length: 255, nullable: true)]
    private $title;

    #[ORM\Column(name: 'content', type: 'text', nullable: true)]
    private $content;

    #[ORM\OneToMany(mappedBy: 'twoColImageText', targetEntity: TwoColImageTextImage::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[ORM\OrderBy(['displayOrder' => 'ASC'])]
    private $images;

    #[ORM\Column(name: 'display_order', type: 'integer', nullable: true)]
    private $displayOrder;

    #[ORM\ManyToOne(targetEntity: TwoColImageTextPagePart::class, inversedBy: 'twoColImageTexts')]
    #[ORM\JoinColumn(name: 'two_col_image_text_pp_id', referencedColumnName: 'id')]
    private $twoColImageTextPagePart;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setContent($content = null)
    {
        $this->content = $content;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function addImage(TwoColImageTextImage $image)
    {
        $image->setTwoColImageText($this);
        $this->images->add($image);

        return $this;
    }

    public function removeImage(TwoColImageTextImage $image)
    {
        return $this->images->removeElement($image);
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setDisplayOrder($displayOrder = null)
    {
        $this->displayOrder = $displayOrder;

        return $this;
    }

    public function getDisplayOrder()
    {
        return $this->displayOrder;
    }

    public function getTwoColImageTextPagePart()
    {
        return $this->twoColImageTextPagePart;
    }

    public function setTwoColImageTextPagePart(TwoColImageTextPagePart $twoColImageTextPagePart): self
    {
        $this->twoColImageTextPagePart = $twoColImageTextPagePart;

        return $this;
    }
}
