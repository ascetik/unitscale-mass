<?php

/**
 * This is part of the UnitScale package.
 *
 * @package    UnitScale
 * @category   Factory
 * @license    https://opensource.org/license/mit/  MIT License
 * @copyright  Copyright (c) 2023, Vidda
 * @author     Vidda <vidda@ascetik.fr>
 */

declare(strict_types=1);

namespace Ascetik\UnitscaleMass\Factories;

use Ascetik\UnitscaleCore\Factories\CustomScaleFactory;
use Ascetik\UnitscaleMass\Scales\MassScale;

/**
 * Scale factory adapted to the mass unit (g)
 * with quintals added and *ton* replacing *mega*
 *
 * @version 1.0.0
 */

class MassScaleFactory extends CustomScaleFactory
{
    public function quintal()
    {
        return new MassScale(5, 'q');
    }

    public function ton()
    {
        return new MassScale(6, 't');
    }
}
