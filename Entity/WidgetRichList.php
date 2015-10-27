<?php

namespace Victoire\Widget\RichListBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Widget\ListingBundle\Entity\WidgetListing;

/**
 * WidgetRichList.
 *
 * @ORM\Table("vic_widget_richlist")
 * @ORM\Entity
 */
class WidgetRichList extends WidgetListing
{
    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="WidgetRichListItem", mappedBy="richList", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    protected $richs;

    /**
     * To String function.
     *
     * @return string
     */
    public function __toString()
    {
        return 'Liste de projets #'.$this->id;
    }

    /**
     * Set richs.
     *
     * @param array $richs
     *
     * @return WidgetListing
     */
    public function setRichs($richs)
    {
        foreach ($richs as $_rich) {
            $_rich->setRichList($this);
        }
        $this->richs = $richs;

        return $this;
    }

    /**
     * Add richs.
     *
     * @param WidgetListingItem $sliderItem
     *
     * @return WidgetListing
     */
    public function addRich(WidgetRichListItem $rich)
    {
        $rich->setRichList($this);
        $this->richs[] = $rich;

        return $this;
    }

    /**
     * Remove richs.
     *
     * @param WidgetRichListItem $rich
     */
    public function removeRich(WidgetRichListItem $rich)
    {
        $this->richs->removeElement($rich);
    }

    /**
     * Get richs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRichs()
    {
        return $this->richs;
    }
}
