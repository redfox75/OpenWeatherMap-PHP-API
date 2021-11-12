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

namespace Cmfcmf\OpenWeatherMap;

use Cmfcmf\OpenWeatherMap\OneCall\Precipitation;
use Cmfcmf\OpenWeatherMap\OneCall\WeatherCurrent;
use Cmfcmf\OpenWeatherMap\OneCall\WeatherDaily;
use Cmfcmf\OpenWeatherMap\OneCall\WeatherHourly;
use Cmfcmf\OpenWeatherMap\Util\DateTimeUtil;
use Cmfcmf\OpenWeatherMap\Util\Location;
use Cmfcmf\OpenWeatherMap\Util\TimeZone;

/**
 * Weather class used to hold the current weather data.
 */
class WeatherOneCall
{
    /**
     * @var Location
     */
    public $location;
    /**
     * @var TimeZone
     */
    public $timeZone;

    /**
     * @var String
     */
    public $units;
    /**
     * @var WeatherCurrent
     */
    public $current;
    /**
     * @var array
     */
    public $minutely;
    /**
     * @var array
     */
    public $hourly;
    /**
     * @var array
     */
    public $daily;

    /**
     * Create a new weather object.
     *
     * @param mixed $json
     * @param string $units
     *
     * @internal
     */
    public function __construct($json, $units = 'metric')
    {

        $this->location = new Location($json->lat, $json->lon);
        $this->timeZone = new TimeZone($json->timezone, $json->timezone_offset);
        $this->units = $units;

        $this->current = new WeatherCurrent($json->current, $this->timeZone->timezone);
        foreach ($json->minutely as $minutelyValue) {
            $data = new DateTimeUtil($minutelyValue->dt, $this->timeZone->timezone);
            $this->minutely[$data->dateTime->format('d.m.Y H:i')] = new Precipitation($minutelyValue->dt, $minutelyValue->precipitation, $this->timeZone->timezone);
        }
        $this->hourly = [];
        foreach ($json->hourly as $hourlyValue) {
            $data = new DateTimeUtil($hourlyValue->dt, $this->timeZone->timezone);
            $this->hourly[$data->dateTime->format('d.m.Y H:i')] =
                new WeatherHourly($hourlyValue, $this->timeZone->timezone);
        }
        $this->daily = [];
        foreach ($json->daily as $dailyValue) {
            $data = new DateTimeUtil($dailyValue->dt, $this->timeZone->timezone);
            $this->daily[$data->dateTime->format('d.m.Y H:i')] =
                new WeatherDaily($dailyValue, $this->timeZone->timezone);
        }

    }
}
