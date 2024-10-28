<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CalculationTest extends TestCase
{
    protected $coldWaterRate = 84.53;
    protected $hotWaterRate = 200.00;

    public function testCalculateColdWaterCharge()
    {
        $consumption = 10;
        $expectedCharge = $consumption * $this->coldWaterRate;

        $actualCharge = $this->calculateCharge($consumption, 'cold');

        $this->assertEquals($expectedCharge, $actualCharge);
    }

    public function testCalculateHotWaterCharge()
    {
        $consumption = 5;
        $expectedCharge = $consumption * $this->hotWaterRate;

        $actualCharge = $this->calculateCharge($consumption, 'hot');

        $this->assertEquals($expectedCharge, $actualCharge);
    }

    private function calculateCharge($consumption, $type)
    {
        $rate = $type === 'cold' ? $this->coldWaterRate : $this->hotWaterRate;
        return $consumption * $rate;
    }
}
