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
 * The wind class representing a wind object.
 */
class Wind
{
    /**
     * @var Unit The wind speed.
     */
    public $speed;

    /**
     * @var Unit|null The wind direction.
     */
    public $direction;

    /**
     * @var Unit|null The wind gusts.
     */
    public $gusts;


    /**
     * Create a new wind object.
     *
     * @param Unit $speed The wind speed.
     * @param Unit $direction The wind direction.
     *
     * @internal
     */
    public function __construct(Unit $speed, Unit $direction = null, $gusts = null)
    {
        $this->speed = $speed;
        $directionWind = self::getDirection($direction->getValue());
        $descriptionWind = $this->getWindName($directionWind);
        if ($direction->getUnit() === "") {
            $direction->setUnit($directionWind);
        }
        if ($direction->getDescription() === "") {
            $direction->setDescription($descriptionWind);
        }
        $this->direction = $direction;
        //    dd($direction);
        $this->gusts = $gusts;
    }


    public static function getDirection(float $degrees): string
    {
        $direction = 'NA';
        $cardinal = [
            'N0' => [348.75, 360],
            'N1' => [0, 11.25],
            'NNE' => [11.25, 33.75],
            'NE' => [33.75, 56.25],
            'ENE' => [56.25, 78.75],
            'E' => [78.75, 101.25],
            'ESE' => [101.25, 123.75],
            'SE' => [123.75, 146.25],
            'SSE' => [146.25, 168.75],
            'S' => [168.75, 191.25],
            'SSW' => [191.25, 213.75],
            'SW' => [213.75, 236.25],
            'WSW' => [236.25, 258.75],
            'W' => [258.75, 281.25],
            'WNW' => [281.25, 303.75],
            'NW' => [303.75, 326.25],
            'NNW' => [326.25, 348.75],
        ];

        foreach ($cardinal as $dir => $angles) {
            if ($degrees >= $angles[0] && $degrees < $angles[1]) {
                $direction = $dir;
                break;
            }
        }
        $direction = ($direction != 'N0' && $direction != 'N1') ? $direction : 'N';
        return $direction;
    }

    public function getWindName(string $windCode = 'NA')
    {
        $windNames = [
            "N" => "North",
            "NNE" => "North Northeast",
            "NE" => "Northeast",
            "ENE" => "East Northeast",
            "E" => "East",
            "ESE" => "East Southeast",
            "SE" => "Southeast",
            "SSE" => "South Southeast",
            "S" => "South",
            "SSW" => "South Southwest",
            "SW" => "Southwest",
            "WSW" => "West Southwest",
            "W" => "West",
            "WNW" => "West Northwest",
            "NW" => "Northwest",
            "NNW" => "North Northwest",
            "NA" => "Not Available"

        ];
        return $windNames[$windCode];
    }
}

