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
 * The moon class representing a moon object.
 */
class Moon
{
    /**
     * @var DateTimeUtil The time of the moon rise.
     */
    public $moonRise;

    /**
     * @var DateTimeUtil The time of the moon set.
     */
    public $moonSet;
    /**
     * @var   String The timezone.
     */
    public $timezone;
    /**
     * @var float moonPhase
     */
    public $moonPhase;

    /**
     * Create a new moon object.
     *
     * @param string $moonRise The time of the moon rise
     * @param string $moonSet  The time of the moon set.
     * @param float    $moonPhase The phase of the moon
     * @param string $timezone The timezone of the location
     *
     * @throws \LogicException If moonset is before moonrise.
     * @internal
     */
    public function __construct(string $moonRise, string $moonSet, float $moonPhase = null, $timezone = 'UTC')
    {
        $this->timezone = $timezone;

        $this->moonRise = new DateTimeUtil($moonRise, $timezone);
        $this->moonSet = new DateTimeUtil($moonSet, $timezone);
        $this->moonPhase = $moonPhase;

    }
}
