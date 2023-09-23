<?php

/**
 * This is part of the UnitScale Mass package.
 *
 * @package    unitscale-mass
 * @category   ScaleValue Factory
 * @license    https://opensource.org/license/mit/  MIT License
 * @copyright  Copyright (c) 2023, Vidda
 * @author     Vidda <vidda@ascetik.fr>
 */

 declare(strict_types=1);

namespace Ascetik\UnitscaleMass\Factories;

use Ascetik\UnitscaleCore\Extensions\AdjustedValue;
use Ascetik\UnitscaleCore\Types\ScaleValueFactory;
use Ascetik\UnitscaleMass\Values\MassScaleValue;

/**
 * Build a MassScaleValue
 *
 * @version 1.0.0
 */
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
