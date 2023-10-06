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
use Ascetik\UnitscaleCore\Parsers\ScaleCommandParser;
use Ascetik\UnitscaleCore\Types\ScaleValueFactory;
use Ascetik\UnitscaleMass\Values\MassScaleValue;

/**
 * Build a MassScaleValue
 *
 * @version 1.0.0
 */
class MassScaler implements ScaleValueFactory
{
    public static function unit(int|float $value): MassScaleValue
    {
        return new MassScaleValue($value);
    }


    /**
     * Use commands prefixed by "from"
     *
     * @param  string $method prefixed ScaleFactory method
     * @param  mixed  $args   value and unit to use,
     *
     * @return void
     */
    public static function __callStatic(string $method, $args): MassScaleValue
    {
        $checker = new ScaleCommandParser('from');
        $command = $checker->parse($method)->name;
        [$value, $unit] = match (count($args)) {
            2 => [...$args],
            1 => [$args[0], ''],
            default => [0, '']
        };
        return MassScaleValue::createFromScale((float) $value, $command, $unit);
    }

}
