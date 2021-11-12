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
 * The sun class representing a sun object.
 */
class Sun
{
    /**
     * @var DateTimeUtil The time of the sun rise.
     */
    public $sunRise;

    /**
     * @var DateTimeUtil The time of the sun set.
     */
    public $sunSet;
    /**
     * @var   String The timezone.
     */
    public $timezone;


    /**
     * Create a new sun object.
     *
     * @param date $dunRise The time of the sun rise
     * @param string $sunSet  The time of the sun set.
     *
     * @throws \LogicException If sunset is before sunrise.
     * @internal
     */
    public function __construct(string $sunRise, string $sunSet, $timezone = 'UTC')
    {
        $this->timezone = $timezone;
        if ($sunSet < $sunRise) {
            throw new \LogicException('Sunset cannot be before sunrise!');
        }
        $this->sunRise = new DateTimeUtil($sunRise, $timezone);
        $this->sunSet = new DateTimeUtil($sunSet, $timezone);

    }
}
