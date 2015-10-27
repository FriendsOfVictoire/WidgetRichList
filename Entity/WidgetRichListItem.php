<?php

namespace Victoire\Widget\RichListBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\CoreBundle\Annotations as VIC;
use Victoire\Widget\ListingBundle\Entity\WidgetListingItem;

/**
 * WidgetRichList.
 *
 * @ORM\Table("vic_widget_richlist_item")
 * @ORM\Entity
 */
class WidgetRichListItem extends WidgetListingItem
{
    use \Victoire\Bundle\WidgetBundle\Entity\Traits\LinkTrait;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     * @VIC\ReceiverProperty("textable")
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="firstText", type="text", nullable=true)
     */
    protected $firstText;

    /**
     * @var string
     *
     * @ORM\Column(name="secondText", type="text", nullable=true)
     */
    protected $secondText;

    /**
     * @var string
     *
     * @ORM\Column(name="thirdText", type="text", nullable=true)
     */
    protected $thirdText;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     * @VIC\ReceiverProperty("textable")
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="kind", type="text", nullable=true)
     */
    protected $kind;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="\Victoire\Bundle\MediaBundle\Entity\Media")
     * @ORM\JoinColumn(name="poster_image_id", referencedColumnName="id", onDelete="CASCADE")
     * @VIC\ReceiverProperty("imageable")
     */
    protected $poster;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="WidgetRichList", inversedBy="richs")
     * @ORM\JoinColumn(name="listing_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $richList;

    /**
     * @var string
     *
     * @ORM\Column(name="link_label", type="string", length=55, nullable=true)
     */
    protected $linkLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="link_enabled", type="boolean", length=55, nullable=true)
     */
    protected $linkEnabled;

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description.
     *
     * @param  string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set firstText.
     *
     * @param string $firstText
     *
     * @return $this
     */
    public function setFirsttext($firstText)
    {
        $this->firstText = $firstText;

        return $this;
    }

    /**
     * Get firstText.
     *
     * @return string
     */
    public function getFirsttext()
    {
        return $this->firstText;
    }

    /**
     * Set secondText.
     *
     * @param string $secondText
     *
     * @return $this
     */
    public function setSecondtext($secondText)
    {
        $this->secondText = $secondText;

        return $this;
    }

    /**
     * Get secondText.
     *
     * @return string
     */
    public function getSecondtext()
    {
        return $this->secondText;
    }

    /**
     * Set thirdText.
     *
     * @param string $thirdText
     *
     * @return $this
     */
    public function setThirdtext($thirdText)
    {
        $this->thirdText = $thirdText;

        return $this;
    }

    /**
     * Get thirdText.
     *
     * @return string
     */
    public function getThirdtext()
    {
        return $this->thirdText;
    }

    /**
     * Get richList.
     *
     * @return string
     */
    public function getRichList()
    {
        return $this->richList;
    }

    /**
     * Set richList.
     *
     * @param string $richList
     *
     * @return $this
     */
    public function setRichList($richList)
    {
        $this->richList = $richList;

        return $this;
    }

    /**
     * Get kind.
     *
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Set kind.
     *
     * @param string $kind
     *
     * @return $this
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get poster.
     *
     * @return string
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * Set poster.
     *
     * @param string $poster
     *
     * @return $this
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * Get linkLabel.
     *
     * @return string
     */
    public function getLinkLabel()
    {
        return $this->linkLabel;
    }

    /**
     * Set linkLabel.
     *
     * @param string $linkLabel
     *
     * @return $this
     */
    public function setLinkLabel($linkLabel)
    {
        $this->linkLabel = $linkLabel;

        return $this;
    }
    /**
     * is link Enabled.
     *
     * @return string
     */
    public function isLinkEnabled()
    {
        return $this->linkEnabled;
    }

    /**
     * Set linkEnabled.
     *
     * @param string $linkEnabled
     *
     * @return $this
     */
    public function setLinkEnabled($linkEnabled)
    {
        $this->linkEnabled = $linkEnabled;

        return $this;
    }
}
