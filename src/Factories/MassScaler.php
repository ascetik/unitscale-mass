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

use Ascetik\UnitscaleCore\Types\ScaleValueFactory;
use Ascetik\UnitscaleCore\Utils\PrefixedCommand;
use Ascetik\UnitscaleMass\Values\MassScaleValue;

/**
 * Build MassScaleValues
 *
 * @method MassScaleValue fromTera(int|float|null $value)
 * @method MassScaleValue fromGiga(int|float|null $value)
 * @method MassScaleValue fromTon(int|float|null $value)
 * @method MassScaleValue fromQuintal(int|float|null $value)
 * @method MassScaleValue fromKilo(int|float|null $value)
 * @method MassScaleValue fromHecto(int|float|null $value)
 * @method MassScaleValue fromDeca(int|float|null $value)
 * @method MassScaleValue fromBase(int|float|null $value)
 * @method MassScaleValue fromDeci(int|float|null $value)
 * @method MassScaleValue fromCenti(int|float|null $value)
 * @method MassScaleValue fromMilli(int|float|null $value)
 * @method MassScaleValue fromMicro(int|float|null $value)
 * @method MassScaleValue fromNano(int|float|null $value)
 * @method MassScaleValue fromPico(int|float|null $value)
 *
 * @version 1.0.0
 */
class MassScaler extends ScaleValueFactory
{
    public static function unit(int|float $value): MassScaleValue
    {
        return new MassScaleValue($value);
    }

    protected static function createWithCommand(PrefixedCommand $command, array $args = []): MassScaleValue
    {
        $value = match (count($args)) {
            1 => $args[0],
            default => 0
        };
        return MassScaleValue::createFromScale((float) $value, $command->name);
    }
}
