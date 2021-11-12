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
class Weather
{


    /**
     * @var Util\Unit
     */
    public $pressure;
    /**
     * @var Util\Unit
     */
    public $humidity;
    /**
     * @var Util\Unit
     */
    public $dewPoint;
    /**
     * @var Util\Unit
     */
    public $uvi;
    /**
     * @var Util\Unit
     */
    public $clouds;


    /**
     * @var Util\Wind
     */
    public $wind;

    /**
     * @var Util\Weather
     */
    public $weather;

    /**
     * @var DateTime
     */
    public $lastUpdate;

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

        // This is kind of a hack, because the units are missing in the document.
        if ($units == 'metric') {
            $windSpeedUnit = 'm/s';
        } else {
            $windSpeedUnit = 'mph';
        }


        $this->timezone = $timezone ?? 'UTC';
        $this->lastUpdate = new DateTimeUtil($data->dt, $this->timezone);
 //       $this->sun = new Sun($data->sunrise, $data->sunset, $this->timezone);
        $this->dewPoint = new Unit($data->dew_point, $units);

        $this->humidity = new Unit($data->humidity, '%');
        $this->pressure = new Unit($data->pressure, 'hPa');
        $this->clouds = new Unit($data->clouds, '%');
        $this->uvi = new Unit($data->uvi);
        $this->wind = new Wind(
            new Unit($data->wind_speed, $windSpeedUnit),
            new Unit($data->wind_deg),
            new Unit($data->wind_gust, $windSpeedUnit)
        );
        $this->weather = new WeatherData($data->weather[0]->id,
            $data->weather[0]->main,
            $data->weather[0]->description,
            $data->weather[0]->icon);



    }
}
