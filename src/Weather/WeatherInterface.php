<?php

namespace DashCode;

use DashCode\APIs\Alerts;
use DashCode\APIs\CurrentConditions;
use DashCode\APIs\Forecast;
use DashCode\APIs\Imagery;
use DashCode\APIs\Indices;
use DashCode\APIs\Locations;
use DashCode\APIs\MinuteCast;
use DashCode\APIs\Translations;
use DashCode\APIs\Tropical;
use DashCode\APIs\WeatherAlarms;

interface WeatherInterface
{

    public static function alerts() : Alerts;

    public static function currentConditions(): CurrentConditions;

    public static function forecast(): Forecast;

    public static function imagery(): Imagery;

    public static function Indices(): Indices;

    public static function Locations(): Locations;

    public static function MinuteCast(): MinuteCast;

    public static function Translations(): Translations;

    public static function Tropical(): Tropical;

    public static function WeatherAlarms(): WeatherAlarms;
}
