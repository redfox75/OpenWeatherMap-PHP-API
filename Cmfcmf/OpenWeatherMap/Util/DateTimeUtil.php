<?php

namespace Cmfcmf\OpenWeatherMap\Util;
use DateTime;
use DateTimeZone;

class DateTimeUtil
{
    /**
     * @var \DateTime The time in a DateTimeObject
     */
    public $dateTime;
    /**
     * @var String The time in raw format.
     */
    public $dateTimeRaw;

    /**
     * @var string The Timezone of the city.
     */
    public $timezone;


    /**
     * Create a new sun object.
     *
     * @param string $dateTime The datetime of the sun rise
     *
     */
    public function __construct(string $dateTime,  $timezone = 'UTC')
    {
        $this->timezone = $timezone;
        $this->dateTimeRaw = $dateTime;
        $this->dateTime = new DateTime('@' . $dateTime, new DateTimeZone($timezone));
    }

}