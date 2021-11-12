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

use Cmfcmf\OpenWeatherMap\OneCall\Temperature;
use Cmfcmf\OpenWeatherMap\Util\DateTimeUtil;

use Cmfcmf\OpenWeatherMap\Util\Unit;
use Cmfcmf\OpenWeatherMap\Util\Wind;
use DateTime;

/**
 * Weather class used to hold the current weather data.
 */
class WeatherDaily extends Weather
{
    /**
     * @var Moon
     */
    public $moon;

    /**
     * @var Util\Unit Probability of precipitation
     */
    public $pop;
    /**
     * @var FeelsLike
     */
public $feelsLike;
    /**
     * Create a new weather object.
     *
     * @param mixed $data
     * @param string $units
     *
     * @internal
     */
    public function __construct($data, $timezone = 'UTC', $units = 'metric')
    {

        parent::__construct($data, $timezone , $units );

        $this->pop =property_exists($data, 'pop') && $data->pop !== null ? new Unit($data->pop, '%') : null;
    //dd($data);

        $this->moon = new Moon($data->moonrise, $data->moonset, $data->moon_phase,$timezone );
        $this->feelsLike = new FeelsLike($data->feels_like,  $units );
        $this->temperature = new Temperature($data->temp,  $units );
    //dd($this);
    }
}
