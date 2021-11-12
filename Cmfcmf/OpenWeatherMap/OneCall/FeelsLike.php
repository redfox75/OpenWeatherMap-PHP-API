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
use DateTime;
use DateTimeZone;
/**
 * The precipitation class representing a single precipitation .
 */
class FeelsLike
{

    /**
     * @var Util\Unit
     */
    public $day;
    /**
     * @var Util\Unit
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
     * Create a new Feels Like object.
     *
     * @param mixed $data input data
     * @param string  $timezone The timezone of the city.
     * @param int  $timezoneOffset The timezone_offset of the city.
     *
     * @internal
     */
    public function __construct( $data, $units = 'metric')
    {
        $this->day = new Unit($data->day, $units);
        $this->night = new Unit($data->night, $units);
        $this->evening = new Unit($data->eve, $units);
        $this->morning = new Unit($data->morn, $units);

    }
}
