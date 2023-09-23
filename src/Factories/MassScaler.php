<?php

namespace Ascetik\UnitscaleMass\Factories;

use Ascetik\UnitscaleCore\Extensions\AdjustedValue;
use Ascetik\UnitscaleCore\Types\ScaleValueFactory;
use Ascetik\UnitscaleMass\Values\MassScaleValue;

class MassScaler implements ScaleValueFactory
{
    public static function unit(int|float $value, string $unit = ''): MassScaleValue
    {
        return new MassScaleValue($value);
    }

    public static function adjust(int|float $value, string $unit = ''): AdjustedValue
    {
        return self::unit($value)->adjust();
    }
}
