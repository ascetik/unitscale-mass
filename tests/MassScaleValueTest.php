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
        $quintal = $converter->fromQuintal();
        $this->assertInstanceOf(MassScaleValue::class,$quintal);
        $this->assertSame('3q',(string)  $quintal);
    }

    public function testFromKiloToQuintal()
    {
        $converter = MassScaler::unit(3000);
        $result = $converter->fromKilo()->toQuintal();
        $this->assertSame(30, $result->raw());
        $this->assertSame('30q',(string) $result);
    }

    public function testConversionFromTon()
    {
        $converter = MassScaler::unit(3);
        $ton = $converter->fromTon();
        $this->assertInstanceOf(MassScaleValue::class,$ton);
        $this->assertSame('3t', (string) $ton);
    }

    public function testFromKiloToTon()
    {
        $converter = MassScaler::unit(3000);
        $result = $converter->fromKilo()->toTon();
        $this->assertSame(3, $result->raw());
        $this->assertSame('3t', (string) $result);
    }

    public function testFromTonToMilli()
    {
        $converter = MassScaler::unit(3000);
        $result = $converter->fromTon()->toMilli();
        $this->assertSame(3000000000000, $result->raw());
        // $this->assertSame('3t', $result);
    }
    
    public function testFromMilliToQuintal()
    {
        $converter = MassScaler::unit(3);
        $result = $converter->fromMicro()->toQuintal();
        $this->assertSame(0.00000000003, $result->raw());
    }
}
