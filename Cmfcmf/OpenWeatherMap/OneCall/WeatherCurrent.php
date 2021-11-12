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

use Cmfcmf\OpenWeatherMap\Util\DateTimeUtil;
use Cmfcmf\OpenWeatherMap\Util\Unit;
use Cmfcmf\OpenWeatherMap\Util\Wind;
use DateTime;

/**
 * Weather class used to hold the current weather data.
 */
class WeatherCurrent extends Weather
{

    /**
     * @var Util\Sun
     */
    public $sun;
    /**
     * The temperature object.
     *
     * @var Util\Temperature
     */
    public $temperature;
    /**
     * @var Util\Unit
     */
    public $feelsLike;
    /**
     * @var Util\Unit
     */
    public $visibility;



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

        if (property_exists($data, 'sunrise') &&
            $data->sunrise !== null
            &&
            property_exists($data, 'sunset') &&
            $data->sunset !== null){
            $this->sun = new Sun($data->sunrise, $data->sunset, $this->timezone);

        }
        $this->temperature = new Unit($data->temp, $units);

        $this->feelsLike = new Unit($data->feels_like, $units);
        $this->visibility = new Unit($data->visibility, 'm');


    }
}
