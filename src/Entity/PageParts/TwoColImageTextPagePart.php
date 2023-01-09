<?php

namespace App\Entity\PageParts;

use App\Entity\TwoColImageText;
use App\Form\PageParts\TwoColImageTextPagePartAdminType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'app_two_col_image_text_page_parts')]
class TwoColImageTextPagePart extends AbstractPagePart
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'title', type: 'string', length: 255, nullable: true)]
    private $title;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'subtitle', type: 'string', length: 255, nullable: true)]
    private $subtitle;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'content', type: 'text', nullable: true)]
    private $content;

    /**
     * @var ArrayCollection
     */
    #[ORM\OneToMany(mappedBy: 'twoColImageTextPagePart', targetEntity: TwoColImageText::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[ORM\OrderBy(['displayOrder' => 'ASC'])]
    private $twoColImageTexts;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->twoColImageTexts = new ArrayCollection();
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

    public function setSubtitle($subtitle = null)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
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

    public function addTwoColImageText(TwoColImageText $twoColImageText)
    {
        $twoColImageText->setTwoColImageTextPagePart($this);
        $this->twoColImageTexts->add($twoColImageText);

        return $this;
    }

    public function removeTwoColImageText(TwoColImageText $twoColImageText)
    {
        return $this->twoColImageTexts->removeElement($twoColImageText);
    }

    public function getTwoColImageTexts()
    {
        return $this->twoColImageTexts;
    }

    public function getDefaultView()
    {
        return 'PageParts/TwoColImageTextPagePart/view.html.twig';
    }

    public function getAdminView()
    {
        return 'PageParts/TwoColImageTextPagePart/admin.html.twig';
    }

    public function getDefaultAdminType()
    {
        return TwoColImageTextPagePartAdminType::class;
    }

}
