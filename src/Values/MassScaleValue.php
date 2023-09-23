<?php

/**
 * This is part of the UnitScale Mass package.
 *
 * @package    unitscale-mass
 * @category   Scale value
 * @license    https://opensource.org/license/mit/  MIT License
 * @copyright  Copyright (c) 2023, Vidda
 * @author     Vidda <vidda@ascetik.fr>
 */

declare(strict_types=1);

namespace Ascetik\UnitscaleMass\Values;

use Ascetik\UnitscaleCore\Extensions\AdjustedValue;
use Ascetik\UnitscaleCore\Types\Scale;
use Ascetik\UnitscaleCore\Types\ScaleFactory;
use Ascetik\UnitscaleCore\Types\ScaleValue;
use Ascetik\UnitscaleMass\Extensions\AdjustedMassValue;
use Ascetik\UnitscaleMass\Factories\MassScaleFactory;
use Ascetik\UnitscaleMass\Scales\MassScale;

/**
 * Scale value reserved to mass (g)
 * using quintal (q) and ton (t)
 *
 * fromMega and toMega are available,
 * not documented...
 *
 * @method self fromTera()
 * @method self fromGiga()
 * @method self fromTon()
 * @method self fromQuintal()
 * @method self fromKilo()
 * @method self fromHecto()
 * @method self fromDeca()
 * @method self fromBase()
 * @method self fromDeci()
 * @method self fromCenti()
 * @method self fromMilli()
 * @method self fromMicro()
 * @method self fromNano()
 * @method self fromPico()
 * @method self toTera()
 * @method self toGiga()
 * @method self toTon()
 * @method self toQuintal()
 * @method self toKilo()
 * @method self toHecto()
 * @method self toDeca()
 * @method self toBase()
 * @method self toDeci()
 * @method self toCenti()
 * @method self toMilli()
 * @method self toMicro()
 * @method self toNano()
 * @method self toPico()
 *
 * @version 1.0.0
 */
class MassScaleValue extends ScaleValue
{
    public const EXCLUDE = ['mega'];

    public function __construct(
        int|float $value,
        ?Scale $scale = null,
    ) {
        parent::__construct($value, $scale);
    }

    public function __call($method, $arguments)
    {
        echo 'calling' . PHP_EOL;
        return parent::__call($method, $arguments);
    }
    /** @override */
    public function getUnit(): string
    {
        return $this->scale instanceof MassScale
            ? parent::getUnit()
            : $this->scale->unit() . 'g';
    }

    public static function selector(): ScaleFactory
    {
        return new MassScaleFactory();
    }

    public function adjust(): AdjustedValue
    {
        return AdjustedValue::buildWith($this);
    }
}
