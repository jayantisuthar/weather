
# Accuweather APIs

This is a PHP Client for connecting with Accuweather APIs allow you to easy integration with APIs


## Installation 

```
composer require dashcode/weather
```
## Tech Stack

**Server:** PHP


## API Reference

### 1. Alerts API

```http
  Weather::alerts()->location($locationKey, $details = false, $options = [])
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `locationKey` | `string` | **Required**. Location specific key |



