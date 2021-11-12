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
 * The location class representing a location object.
 */
class TimeZone
{
    /**
     * @var string The Timezone of the city.
     */
    public $timezone;

    /**
     * @var int The timezone offset of the city.
     */
    public $timezoneOffset;

    /**
     * Create a new timezone object.
     *
     * @param string  $timezone The timezone of the city.
     * @param int  $timezoneOffset The timezone_offset of the city.
     *
     * @internal
     */
    public function __construct(string $timezone = null, int $timezoneOffset = null)
    {
        $this->timezone = isset($timezone) ? $timezone : null;
        $this->timezoneOffset = isset($timezoneOffset) ? (int)$timezoneOffset : 0;
    }
}
