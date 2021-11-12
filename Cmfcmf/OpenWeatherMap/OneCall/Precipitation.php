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
use DateTime;
use DateTimeZone;
/**
 * The precipitation class representing a single precipitation .
 */
class Precipitation
{
    /**
     * @var string The Timezone of the city.
     */
    public $timezone;
    /**
     * @var DateTimeUtil
     */
    public $dateTime;
    /**
     * @var float
     */
    public $precipitation;


    /**
     * Create a new timezone object.
     *
     * @param string  $timezone The timezone of the city.
     * @param int  $timezoneOffset The timezone_offset of the city.
     *
     * @internal
     */
    public function __construct( string $dateTime = null, float $precipitation=0.0, string  $timezone = 'UTC')
    {
        $this->timezone = isset($timezone) ? $timezone : 'UTC';
        $this->dateTime = new DateTimeUtil( $dateTime, $this->timezone);

        $this->precipitation = isset($precipitation) ? $precipitation : 0.0;
    }
}
