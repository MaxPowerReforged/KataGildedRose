<?php


namespace App;
use App\Item;

class AgedBrie extends Item
{
    public function updateQuality()
    {
        $currentSellIn = $this->getSellIn();
        $this->setSellIn($currentSellIn - 1);

        $currentQuality = $this->getQuality();
        $this->setQuality($currentQuality + 1);
    }
}
