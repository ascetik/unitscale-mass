<?php

namespace Ascetik\UnitscaleMass\Tests;

use Ascetik\UnitscaleMass\Factories\MassScaler;
use PHPUnit\Framework\TestCase;

class MassScaleAdjustTest extends TestCase
{
    public function testShouldAdjustToKilo()
    {
        $adjusted = MassScaler::unit(3000)->adjust();
        $this->assertSame('3kg', (string) $adjusted);
    }

    public function testShouldAdjustToTon()
    {
        $adjusted = MassScaler::unit(3000000)->adjust();
        $this->assertSame('3t', (string) $adjusted);
    }

    public function testShouldLimitResultScaleToQuintal()
    {
        $adjusted = MassScaler::unit(3000000)->adjust()->asQuintal();
        $this->assertSame('30q', (string) $adjusted);
    }

    public function testShouldAdjustFromKiloToTon()
    {
        $adjusted = MassScaler::fromKilo(3000)->adjust();
        $this->assertSame('3t', (string) $adjusted);
    }
    
    public function testShouldAdjustFromKiloToQuintal()
    {
        $adjusted = MassScaler::fromKilo(3000)
            ->adjust()
            ->asQuintal();
        $this->assertSame('30q', (string) $adjusted);
    }
}
