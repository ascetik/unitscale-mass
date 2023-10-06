<?php

declare(strict_types=1);

namespace Ascetik\UnitscaleMass\Tests;

use Ascetik\UnitscaleMass\Factories\MassScaler;
use Ascetik\UnitscaleMass\Values\MassScaleValue;
use PHPUnit\Framework\TestCase;

class MassScaleValueTest extends TestCase
{
    public function testConversionFromQuintal()
    {
        $converter = MassScaler::unit(3);
        $this->assertSame('3g', (string) $converter);
        $quintal = MassScaler::fromQuintal(3);
        $this->assertInstanceOf(MassScaleValue::class,$quintal);
        $this->assertSame('3q',(string)  $quintal);
    }

    public function testFromKiloToQuintal()
    {
        // $converter = MassScaler::unit(3000);
        $result = MassScaler::fromKilo(3000)->toQuintal();
        $this->assertSame(30, $result->raw());
        $this->assertSame('30q',(string) $result);
    }

    public function testConversionFromTon()
    {
        $ton = MassScaler::fromTon(3);
        $this->assertInstanceOf(MassScaleValue::class,$ton);
        $this->assertSame('3t', (string) $ton);
    }

    public function testFromKiloToTon()
    {
        $result = MassScaler::fromKilo(3000)->toTon();
        $this->assertSame(3, $result->raw());
        $this->assertSame('3t', (string) $result);
    }

    public function testFromTonToMilli()
    {
        $result = MassScaler::fromTon(3000)->toMilli();
        $this->assertSame(3000000000000, $result->raw());
        // $this->assertSame('3t', $result);
    }
    
    public function testFromMilliToQuintal()
    {
        $result = MassScaler::fromMicro(3)->toQuintal();
        $this->assertSame(0.00000000003, $result->raw());
    }
    public function testFromQuintalToKilo()
    {
        $result = MassScaler::fromQuintal(30)->toKilo();
        $this->assertSame(3000, $result->raw());
    }
}
