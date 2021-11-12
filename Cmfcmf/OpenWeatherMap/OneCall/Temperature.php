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

namespace Cmfcmf\OpenWeatherMap\OneCall;

use Cmfcmf\OpenWeatherMap\Util\Unit;

/**
 * The temperature class representing a temperature object.
 */
class Temperature
{

    /**
     * @var Unit The day temperature. Might not be null.
     */
    public $day;
    /**
     * @var Unit The minimal temperature.
     */
    public $min;

    /**
     * @var Unit The maximal temperature.
     */
    public $max;
    /**
     * @var Unit The night temperature. Might not be null.
     */
    public $night;

    /**
     * @var Unit The evening temperature. Might not be null.
     */
    public $evening;
    /**
     * @var Unit The morning temperature. Might not be null.
     */
    public $morning;
    

    


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
     * @param mixed $data input data
     *
     * The current temperature.
     * The minimal temperature.
     * The maximal temperature.
     * The day temperature. Might not be null.
     * The morning temperature. Might not be null.
     * The evening temperature. Might not be null.
     * The night temperature. Might not be null.
     *
     * @internal
     */
    public function __construct( $data, $units = 'metric')
    {
        $this->day = new Unit($data->day, $units);
        $this->min = new Unit($data->min, $units);
        $this->max = new Unit($data->max, $units);
        $this->night = new Unit($data->night, $units);
        $this->evening = new Unit($data->eve, $units);
        $this->morning = new Unit($data->morn, $units);
    }

}
