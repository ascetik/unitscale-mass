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

use Ascetik\UnitscaleCore\Scales\CustomScale;
use Ascetik\UnitscaleCore\Types\ScaleFactory;

/**
 * Scale factory adapted to the mass unit (g)
 * with quintals added and *ton* replacing *mega*
 *
 * @version 1.0.0
 */

class MassScaleFactory implements ScaleFactory
{
    public function tera()
    {
        return new CustomScale(12, 'Tg');
    }

    public function giga()
    {
        return new CustomScale(9, 'Gg');
    }

    public function mega()
    {
        return $this->ton();
    }

    public function quintal()
    {
        return new CustomScale(5, 'q');
    }

    public function ton()
    {
        return new CustomScale(6, 't');
    }

    public function kilo()
    {
        return new CustomScale(3, 'kg');
    }

    public function hecto()
    {
        return new CustomScale(2, 'hg');
    }

    public function deca()
    {
        return new CustomScale(1, 'dag');
    }

    public function base(): CustomScale
    {
        return new CustomScale(0, 'g');
    }

    public function deci()
    {
        return new CustomScale(-1, 'dg');
    }

    public function centi()
    {
        return new CustomScale(-2, 'cg');
    }

    public function milli()
    {
        return new CustomScale(-3, 'mg');
    }

    public function micro()
    {
        return new CustomScale(-6, 'μg');
    }

    public function nano()
    {
        return new CustomScale(-9, 'ng');
    }

    public function pico()
    {
        return new CustomScale(-12, 'pg');
    }
}
