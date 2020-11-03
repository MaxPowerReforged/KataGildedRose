<?php

namespace App;

class Item
{

    protected string $name;
    protected int $sellIn;
    protected int $quality;

    public function __construct(
        $name,
        $sellIn,
        $quality
    ) {
        $this->setName($name);
        $this->setSellIn($sellIn);
        $this->setQuality($quality);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSellIn()
    {
        return $this->sellIn;
    }

    public function setSellIn($sellIn)
    {
        $this->sellIn = $sellIn;
    }

    public function getQuality()
    {
        return $this->quality;
    }

    public function setQuality($quality)
    {
        if($quality < 0) $quality = 0;
        if($quality > 50) $quality = 50;
        $this->quality = $quality;
    }

    public function updateQuality()
    {
        $currentQuality = $this->getQuality();
        if($this->getSellIn() > 0) $this->setQuality($currentQuality - 1);
        else $this->setQuality($currentQuality - 2);

        $currentSellIn = $this->getSellIn();
        $this->setSellIn($currentSellIn - 1);
    }
}
