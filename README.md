
# Accuweather APIs

This is a PHP Client for connecting with Accuweather APIs allow you to easy integration with APIs


## Installation 

```
composer require dashcode/weather
```

## Set Environment Variables
You can set environment variables like key and language settings via `.env` file 
```
ACCU_WEATHER_KEY=your key
ACCU_WEATHER_LOCALE=en-us ( default ) 
```

Alternatively You can also pass the key and language settings directly into Weather Class 
```
new Weather("your accuweather key", "language");
```

## How To Use APIs 
after setting up the .env variable via `.env` file or directly injected into class

1. Make a weather Class object of ```DashCode\Weather```
```
$accuWeatherApp = new Weather();
```

2. Select the Api Class
```
1. Alert API 
$response = $accuWeatherApp->Alerts();

2. Current Condition API 
$response = $accuWeatherApp->CurrentConditions();

3. Forecast API 
$response = $accuWeatherApp->Forecast();

4. Imagery API 
$response = $accuWeatherApp->Imagery();

5. Indices API 
$response = $accuWeatherApp->Indices();

6. Locations API 
$response = $accuWeatherApp->Locations();

7. MinuteCast API 
$response = $accuWeatherApp->MinuteCast();

8. Translation API 
$response = $accuWeatherApp->Translations();

9. Tropical API 
$response = $accuWeatherApp->Tropical();

10. Weather Alart API 
$response = $accuWeatherApp->WeatherAlarms();

```
3. Select API endpoint and add required paramaters to method for ```Alert``` Api we can do like this
```
$accuWeatherApp = new Weather();
$alertApis = $accuWeatherApp->Alerts();

$apiResponse = $alertApis->location("location key", true );

```
Please refer to the documentation of accuweather or package method for required params 

## Tech Stack

**Server:** PHP



## API Reference

### Here Below All the api are listed module and submodule wise and accepted required and optional parameters


| **#** | **Module**        | **Submodule**                 | **Accu Weather API**                                                       | **Package Method **                                                                                                                                                    |
|-------|-------------------|-------------------------------|----------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| 1     | Alerts            |                               | `alerts/v1/{locationKey}`                                                  | `location($locationKey, bool $details = false)`                                                                                                                        |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
| 2     | CurrentConditions | Current Conditions            | `currentconditions/v1/{locationKey}`                                       | `location($locationKey, bool $details = false)`                                                                                                                        |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   | Top Cities                    | `currentconditions/v1/topcities/{group}`                                   | `topCities(int $group = 50)`                                                                                                                                           |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   | Historical Current Conditions | `currentconditions/v1/{locationKey}/historical/24`                         | `past24HourCondition($locationKey, bool $details = false)`                                                                                                             |
|       |                   |                               | `currentconditions/v1/{locationKey}/historical`                            | `past6HourCondition($locationKey, bool $details = false)`                                                                                                              |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
| 3     | Forecast          | Daily                         | `forecasts/v1/daily/1day/{locationKey}`                                    | `daily(string $locationKey, int $day = 1, bool $details = false, bool $metrics = false)`                                                                               |
|       |                   |                               | `forecasts/v1/daily/10day/{locationKey}`                                   |                                                                                                                                                                        |
|       |                   |                               | `forecasts/v1/daily/15day/{locationKey}`                                   |                                                                                                                                                                        |
|       |                   |                               | `forecasts/v1/daily/5day/{locationKey}`                                    |                                                                                                                                                                        |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   | Hourly                        | `forecasts/v1/hourly/1hour/{locationKey}`                                  | `hourly(string $locationKey, int $hour = 1, bool $details = false, bool $metrics = false)`                                                                             |
|       |                   |                               | `forecasts/v1/hourly/12hour/{locationKey}`                                 |                                                                                                                                                                        |
|       |                   |                               | `forecasts/v1/hourly/120hour/{locationKey}`                                |                                                                                                                                                                        |
|       |                   |                               | `forecasts/v1/hourly/24hour/{locationKey}`                                 |                                                                                                                                                                        |
|       |                   |                               | `forecasts/v1/hourly/72hour/{locationKey}`                                 |                                                                                                                                                                        |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
| 4     | Imagery           |                               | `imagery/v1/maps/radsat/{resolution}/{locationKey}`                        | `daily(string $locationKey, int $width = 480, int $height = 480)`                                                                                                      |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
| 5     | Indices           | Daily                         | `indices/v1/daily/1day/{locationKey}/groups/{ID}`                          | `locationSpecificGroup(string $locationKey, int $day, int $groupId, bool $details = false)`                                                                            |
|       |                   |                               | `indices/v1/daily/5day/{locationKey}/groups/{ID}`                          |                                                                                                                                                                        |
|       |                   |                               | `indices/v1/daily/10day/{locationKey}/groups/{ID}`                         |                                                                                                                                                                        |
|       |                   |                               | `indices/v1/daily/15day/{locationKey}/groups/{ID}`                         |                                                                                                                                                                        |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   |                               | `indices/v1/daily/1day/{locationKey}/{ID}`                                 | `locationSpecificIndex(string $locationKey, int $day, int $indexId, bool $details = false)`                                                                            |
|       |                   |                               | `indices/v1/daily/5day/{locationKey}/{ID}`                                 |                                                                                                                                                                        |
|       |                   |                               | `indices/v1/daily/10day/{locationKey}/{ID}`                                |                                                                                                                                                                        |
|       |                   |                               | `indices/v1/daily/15day/{locationKey}/{ID}`                                |                                                                                                                                                                        |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   |                               | `indices/v1/daily/1day/{locationKey}`                                      | `locationAllIndices(string $locationKey, int $day, bool $details = false)`                                                                                             |
|       |                   |                               | `indices/v1/daily/5day/{locationKey}`                                      |                                                                                                                                                                        |
|       |                   |                               | `indices/v1/daily/10day/{locationKey}`                                     |                                                                                                                                                                        |
|       |                   |                               | `indices/v1/daily/15day/{locationKey}`                                     |                                                                                                                                                                        |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
| 6     |                   | MetaData                      | `indices/v1/daily`                                                         | `allDailyIndicesMetaData()`                                                                                                                                            |
|       |                   |                               | `indices/v1/daily/groups`                                                  | `allIndexGroupMetaData()`                                                                                                                                              |
|       |                   |                               | `indices/v1/daily/groups/{ID}`                                             | `specificGroupAllIndicesMetaData($ID)`                                                                                                                                 |
|       |                   |                               | `indices/v1/daily/{ID}`                                                    | `specificIndexMetaData($ID)`                                                                                                                                           |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
| 7     | Locations         | List                          | `locations/v1/adminareas/{countryCode}`                                    | `adminAreaListInCountry($countryCode, $offset = null)`                                                                                                                 |
|       |                   |                               | `locations/v1/countries/{regionCode}`                                      | `countriesListInRegion($regionCode)`                                                                                                                                   |
|       |                   |                               | `locations/v1/regions`                                                     | `regionsList()`                                                                                                                                                        |
|       |                   |                               | `locations/v1/topcities/{group}`                                           | `topCitiesListByGroup($group, bool $details = false)`                                                                                                                  |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   | AutoComplete                  | `locations/v1/cities/autocomplete`                                         | `autoCompleteSearch(string $search)`                                                                                                                                   |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   | Location Key                  | `locations/v1/cities/neighbors/{locationKey}`                              | `neighborCitiesByLocation($locationKey, bool $details = false)`                                                                                                        |
|       |                   |                               | `locations/v1/{locationKey}`                                               | `searchByLocation($locationKey, bool $details = false)`                                                                                                                |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   | Text Search                   | `locations/v1/cities/search`                                               | `searchByCity(string $search, $countryCode = null, $adminCode = null, bool $details = false, $offset = null, $alias = null)`                                           |
|       |                   |                               | `locations/v1/cities/{countryCode}/{adminCode}/search`                     |                                                                                                                                                                        |
|       |                   |                               | `locations/v1/cities/{countryCode}/search`                                 |                                                                                                                                                                        |
|       |                   |                               | `locations/v1/poi/search`                                                  | `searchByPOI(string $search, $countryCode = null, $adminCode = null, bool $details = false, string $typeID = null)`                                                    |
|       |                   |                               | `locations/v1/poi/{countryCode}/{adminCode}/search`                        |                                                                                                                                                                        |
|       |                   |                               | `locations/v1/poi/{countryCode}/search`                                    |                                                                                                                                                                        |
|       |                   |                               | `locations/v1/postalcodes/search`                                          | `searchByPostalCode(string $code, $countryCode = null, bool $details = false)`                                                                                         |
|       |                   |                               | `locations/v1/postalcodes/{countryCode}/search`                            |                                                                                                                                                                        |
|       |                   |                               | `locations/v1/search`                                                      | `searchByText(string $search, $countryCode = null, $adminCode = null, bool $details = false, $offset = null, $alias = null)`                                           |
|       |                   |                               | `locations/v1/{countryCode}/{adminCode}/search`                            |                                                                                                                                                                        |
|       |                   |                               | `locations/v1/{countryCode}/search`                                        |                                                                                                                                                                        |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   | Geoposition                   | `locations/v1/cities/geoposition/search`                                   | `searchByGeoPosition(string $lat, string $long, bool $details = false, bool $toplevel = false)`                                                                        |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   | IP Address                    | `locations/v1/cities/ipaddress`                                            | `searchByIPAddress(string $ip, bool $details = false)`                                                                                                                 |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
| 8     | MinuteCast        |                               | `forecasts/v1/minute`                                                      | `summary(float $lat , float $long)`                                                                                                                                    |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
| 9     | Translations      |                               | `translations/v1/languages`                                                | `listAllLanguages()`                                                                                                                                                   |
|       |                   |                               | `translations/v1/groups`                                                   | `listAvailableTranslationGroup()`                                                                                                                                      |
|       |                   |                               | `translations/v1/groups/{groupID}`                                         | `listOfTranslationsForSpecificGroup(int $groupID)`                                                                                                                     |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
| 10    | Tropical          | Search                        | `tropical/v1/gov/storms/{yyyy}`                                            | `govtIssuedStormsWithYearBasinAndGovtID(int $year, string $basinID = null, $governmentID = null)`                                                                      |
|       |                   |                               | `tropical/v1/gov/storms/{yyyy}/{basinID}`                                  |                                                                                                                                                                        |
|       |                   |                               | `tropical/v1/gov/storms/{yyyy}/{basinID}/{governmentID}`                   |                                                                                                                                                                        |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   |                               | `tropical/v1/gov/storms/active`                                            | `govtIssuedActiveStormsWithBasinAndGovtID(string $basinID = null, $governmentID = null)`                                                                               |
|       |                   |                               | `tropical/v1/gov/storms/active/{basinId}`                                  |                                                                                                                                                                        |
|       |                   |                               | `tropical/v1/gov/storms/active/{basinID}/{governmentID}`                   |                                                                                                                                                                        |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   | Position                      | `tropical/{version}/gov/storms/{yyyy}/{basinID}/{governmentID}/positions`  | `allPositionsOfCyclone(string $version, int $year, string $basinID, $governmentID, bool $details = false, bool $radiigeometry = false, bool $includeLandmarks = true)` |
|       |                   |                               | `tropical/v1/gov/storms/{yyyy}/{basinID}/{governmentID}/positions/current` | `currentPositionOfCyclone(int $year, string $basinID, $governmentID, bool $details = false, bool $radiigeometry = false, bool $includeLandmarks = true)`               |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
|       |                   | Forecast                      | `tropical/v1/gov/storms/{yyyy}/{basinID}/{governmentID}/forecasts`         | `forecastOfCyclone(int $year, string $basinID, $governmentID, bool $details = false, bool $radiigeometry = false, bool $includeLandmarks = true)`                      |
|       |                   |                               |                                                                            |                                                                                                                                                                        |
| 10    | WeatherAlarms     |                               | `alarms/v1/1day/{locationKey}`                                             | `dayWise(string $locationKey, int $day = 1)`                                                                                                                           |
|       |                   |                               | `alarms/v1/5day/{locationKey}`                                             |                                                                                                                                                                        |
|       |                   |                               | `alarms/v1/10day/{locationKey}`                                            |                                                                                                                                                                        |
|       |                   |                               | `alarms/v1/15day/{locationKey}`                                            |                                                                                                                                                                        |


