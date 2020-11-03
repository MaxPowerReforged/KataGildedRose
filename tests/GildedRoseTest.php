<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\GildedRose;
use App\Item;
use App\AgedBrie;
use App\Sulfuras;
use App\BackstagePass;
use App\Conjured;

class GildedRoseTest extends TestCase
{

	public function test_Some_Item_Decrease_Quality_in_1_unit()
	{
		$someItem = new Item("Some Item", 2, 3);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(2, $someItem->getQuality());
	}

	public function test_Item_Decrease_Quality_Double_when_SellIn_passed()
	{
		$someItem = new Item("Some Item", -1, 3);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(1, $someItem->getQuality());
	}

	public function test_Item_Quality_Cant_be_Negative()
	{
		$someItem = new Item("Some Item", -1, -1); //doesn't decrease below but can be set to negative numbers

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(0, $someItem->getQuality());
	}

	public function test_Aged_Brie_increases_Quality()
	{
		$agedBrie = new AgedBrie("Aged Brie", 2, 3);

		GildedRose::updateQuality([$agedBrie]);

		$this->assertEquals(4, $agedBrie->getQuality());
	}

	public function test_Item_Quality_max_50()
	{
		$agedBrie = new AgedBrie("Aged Brie", 2, 50); //doesn't increase above 50 but can be set to more than 50

		GildedRose::updateQuality([$agedBrie]);

		$this->assertEquals(50, $agedBrie->getQuality());
	}

	public function test_Sulfuras_no_decrease_quality()
	{
		$sulfuras = new Sulfuras("Sulfuras, Hand of Ragnaros"); //needs Sulfuras, Hand of Ragnaros

		GildedRose::updateQuality([$sulfuras]);

		$this->assertEquals(80, $sulfuras->getQuality());
	}

	public function test_Sulfuras_no_decrease_sellIn()
	{
		$sulfuras = new Sulfuras("Sulfuras, Hand of Ragnaros"); //needs Sulfuras, Hand of Ragnaros

		GildedRose::updateQuality([$sulfuras]);

		$this->assertEquals(0, $sulfuras->getSellIn());
	}

	public function test_backstage_passes_quality_increase()
	{
		$backstagePass = new BackStagePass("Backstage passes to a TAFKAL80ETC concert", 11, 40); //needs that ticket name

		GildedRose::updateQuality([$backstagePass]);

		$this->assertEquals(41, $backstagePass->getQuality());
	}

	public function test_backstage_passes_quality_increase_double_10_days()
	{
		$backstagePass = new BackStagePass("Backstage passes to a TAFKAL80ETC concert", 9, 40); //needs that ticket name

		GildedRose::updateQuality([$backstagePass]);

		$this->assertEquals(42, $backstagePass->getQuality());
	}

	public function test_backstage_passes_quality_increase_triple_5_days()
	{
		$backstagePass = new BackStagePass("Backstage passes to a TAFKAL80ETC concert", 4, 40); //needs that ticket name

		GildedRose::updateQuality([$backstagePass]);

		$this->assertEquals(43, $backstagePass->getQuality());
	}

	public function test_backstage_passes_quality_0_after_concert()
	{
		$backstagePass = new BackStagePass("Backstage passes to a TAFKAL80ETC concert", -1, 40); //needs that ticket name

		GildedRose::updateQuality([$backstagePass]);

		$this->assertEquals(0, $backstagePass->getQuality());
	}

	public function test_conjured_quality_decreases_double_rate()
	{
		$conjuredItem = new Conjured("conjured", 4, 40); //needs that ticket name

		GildedRose::updateQuality([$conjuredItem]);

		$this->assertEquals(38, $conjuredItem->getQuality());
	}
}
