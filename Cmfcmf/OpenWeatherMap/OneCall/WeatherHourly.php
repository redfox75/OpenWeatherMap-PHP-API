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
class WeatherHourly extends Weather
{

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
     * @var Util\Unit Probability of precipitation
     */
    public $pop;

    /**
     * @var Util\Unit  Rain volume for last hour, mm
     */
    public $rain;
    /**
     * @var Util\Unit  Snow volume for last hour, mm
     */
    public $snow;


    /**
     * @var Util\Unit
     */
    public $precipitation;




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
        $this->temperature = new Unit($data->temp, $units);

        $this->feelsLike = new Unit($data->feels_like, $units);
//       dd($data);
        $this->visibility = new Unit($data->visibility, 'm');


        $this->pop =property_exists($data, 'pop') && $data->pop !== null ? new Unit($data->pop, '%') : null;
        $this->rain = property_exists($data, 'rain') && $data->rain !== null ? new Unit($data->rain->{'1h'}, 'mm') : null;
        $this->snow = property_exists($data, 'snow') && $data->snow !== null ? new Unit($data->snow->{'1h'}, '%') : null;


        /*
 hourly.rain
hourly.rain.1h (where available) Rain volume for last hour, mm
hourly.snow
hourly.snow.1h (where available) Snow volume for last hour, mm

hourly.weather
hourly.weather.id Weather condition id
hourly.weather.main Group of weather parameters (Rain, Snow, Extreme etc.)
hourly.weather.description Weather condition within the group (full list of weather conditions). Get the output in your language
hourly.weather.icon Weather icon id. How to get icons
 */

    }
}
