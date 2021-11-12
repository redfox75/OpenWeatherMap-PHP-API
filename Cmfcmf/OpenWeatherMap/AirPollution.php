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

use Cmfcmf\OpenWeatherMap\Util\Location;
use Cmfcmf\OpenWeatherMap\Util\Unit;
use DateTime;
use DateTimeZone;

class AirPollution
{
    /**
     * @var DateTime
     */
    public $time;

    /**
    * @var Location
    */
    public $location;

    /**
    * @var Util\Unit
    */
    public $aqi;

    /**
    * @var Util\Unit
    */
    public $co;
    /**
    * @var Util\Unit
    */
    public $no;

    /**
    * @var Util\Unit
    */
    public $no2;
    /**
    * @var Util\Unit
    */
    public $o3;
    /**
    * @var Util\Unit
    */
    public $so2;

    /**
    * @var Util\Unit
    */
    public $pm2_5;
    /**
    * @var Util\Unit
    */
    public $pm10;
    /**
    * @var Util\Unit
    */
    public $nh3;


    public $componentsDescription = [
        'co' => 'Сoncentration of CO (Carbon monoxide)',
        'no' => 'Сoncentration of NO (Nitrogen monoxide)',
        'no2' => 'Сoncentration of NO2 (Nitrogen dioxide)',
        'o3' => 'Сoncentration of O3 (Ozone)',
        'so2' => 'Сoncentration of SO2 (Sulphur dioxide)',
        'pm2_5' => 'Сoncentration of PM2.5 (Fine particles matter)',
        'pm10' => 'Сoncentration of PM10 (Coarse particulate matter)',
        'nh3' => 'Сoncentration of NH3 (Ammonia), μg/m3'


    ];


    public $airQualityIndex = [
        1 => 'Good',
        2 => 'Fair',
        3 => 'Moderate',
        4 => 'Poor',
        5 => 'Very Poor'
    ];

    /**
     * @param object $json
     *
     * @throws \Exception
     * @internal
     */
    public function __construct($json,$jsonData)
    {
        $this->time = new DateTime('@' . $jsonData->dt, new DateTimeZone('UTC'));
        $this->location = new Location($json->coord->lat, $json->coord->lon);

        $this->aqi = new Unit ($jsonData->main->aqi, null, $this->airQualityIndex[$jsonData->main->aqi]);

        /* save components */
        $this->co = new Unit($jsonData->components->co, 'μg/m³', $this->componentsDescription['co']);
        $this->no = new Unit($jsonData->components->no, 'μg/m³', $this->componentsDescription['no']);
        $this->no2 = new Unit($jsonData->components->no2, 'μg/m³', $this->componentsDescription['no2']);
        $this->o3 = new Unit($jsonData->components->o3, 'μg/m³', $this->componentsDescription['o3']);
        $this->so2 = new Unit($jsonData->components->so2, 'μg/m³', $this->componentsDescription['so2']);
        $this->no2 = new Unit($jsonData->components->no2, 'μg/m³', $this->componentsDescription['no2']);
        $this->pm2_5 = new Unit($jsonData->components->pm2_5, "μg/m³", $this->componentsDescription['pm2_5']);
        $this->pm10 = new Unit($jsonData->components->pm10, "μg/m³", $this->componentsDescription['pm10']);
        $this->nh3 = new Unit($jsonData->components->nh3, 'μg/m³', $this->componentsDescription['nh3']);
    }
}
