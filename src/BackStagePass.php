<?php


namespace App;
use App\Item;

class BackStagePass extends Item
{
    public function updateQuality()
    {
        $currentQuality = $this->getQuality();
        if($this->getSellIn() > 10) $this->setQuality($currentQuality + 1);
        else if ($this->getSellIn() > 5) $this->setQuality($currentQuality + 2);
        else if ($this->getSellIn() > 0) $this->setQuality($currentQuality + 3);
        else $this->setQuality(0);

        $currentSellIn = $this->getSellIn();
        $this->setSellIn($currentSellIn - 1);
    }
}
