<?php

namespace Ascetik\UnitscaleMass\Tests;

use Ascetik\UnitscaleMass\Factories\MassScaler;
use PHPUnit\Framework\TestCase;

class MassScaleAdjustTest extends TestCase
{
    public function testShouldAdjustToKilo()
    {
        $adjusted = MassScaler::adjust(3000);
        $this->assertSame('3kg', (string) $adjusted);
    }

    public function testShouldAdjustToTon()
    {
        $adjusted = MassScaler::adjust(3000000);
        $this->assertSame('3t', (string) $adjusted);
    }

    public function testShouldLimitResultScaleToQuintal()
    {
        $adjusted = MassScaler::adjust(3000000)->toQuintal();
        echo $adjusted . PHP_EOL;
        $this->assertSame('30q', (string) $adjusted);
    }

    public function testShouldAdjustFromKiloToTon()
    {
        $adjusted = MassScaler::unit(3000)->fromKilo()->adjust();
        $this->assertSame('3t', (string) $adjusted);
    }
    
    public function testShouldAdjustFromKiloToQuintal()
    {
        $adjusted = MassScaler::unit(3000)->fromKilo()
            ->adjust()
            ->toQuintal();
        $this->assertSame('30q', (string) $adjusted);
    }
}
