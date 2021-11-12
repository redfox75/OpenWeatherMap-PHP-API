<?php

/*
 * OpenWeatherMap-PHP-API — A PHP API to parse weather data from https://OpenWeatherMap.org.
 *
 * @license MIT
 *
 * Please see the LICENSE file distributed with this source code for further
 * information regarding copyright and licensing.
 *
 * Please visit the following links to read about the usage policies and the license of
 * OpenWeatherMap data before using this library:
 *
 * @see https://OpenWeatherMap.org/price
 * @see https://OpenWeatherMap.org/terms
 * @see https://OpenWeatherMap.org/appid
 */

namespace Cmfcmf\OpenWeatherMap\Util;

/**
 * The temperature class representing a temperature object.
 */
class FeelsLike
{
    /**
     * @var Unit The current temperature Looks Like.
     */
    public $now;


    /**
     * Returns the current temperature as formatted string.
     *
     * @return string The current temperature as a formatted string.
     */
    public function __toString()
    {
        return $this->now->__toString();
    }

    /**
     * Returns the current temperature's unit.
     *
     * @return string The current temperature's unit.
     */
    public function getUnit()
    {
        return $this->now->getUnit();
    }

    /**
     * Returns the current temperature.
     *
     * @return string The current temperature.
     */
    public function getValue()
    {
        return $this->now->getValue();
    }

    /**
     * Returns the current temperature's description.
     *
     * @return string The current temperature's description.
     */
    public function getDescription()
    {
        return $this->now->getDescription();
    }

    /**
     * Returns the current temperature as formatted string.
     *
     * @return string The current temperature as formatted string.
     */
    public function getFormatted()
    {
        return $this->now->getFormatted();
    }

    /**
     * Create a new temperature object.
     *
     * @param Unit $now The current temperature.
     * @param Unit $min The minimal temperature.
     * @param Unit $max The maximal temperature.
     * @param Unit $day The day temperature. Might not be null.
     * @param Unit $morning The morning temperature. Might not be null.
     * @param Unit $evening The evening temperature. Might not be null.
     * @param Unit $night The night temperature. Might not be null.
     *
     * @internal
     */
    public function __construct(Unit $now)
    {
        $this->now = $now;

    }
}
