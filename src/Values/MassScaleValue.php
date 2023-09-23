<?php

namespace Ascetik\UnitscaleMass\Values;

use Ascetik\UnitscaleCore\Extensions\AdjustedValue;
use Ascetik\UnitscaleCore\Types\Scale;
use Ascetik\UnitscaleCore\Types\ScaleFactory;
use Ascetik\UnitscaleCore\Types\ScaleValue;
use Ascetik\UnitscaleMass\Factories\MassScaleFactory;
use Ascetik\UnitscaleMass\Scales\MassScale;

class MassScaleValue extends ScaleValue
{
    public const EXCLUDE = ['mega'];

    public function __construct(
        int|float $value,
        ?Scale $scale = null,
    ) {
        parent::__construct($value, $scale);
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
