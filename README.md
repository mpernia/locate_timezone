# locate_timezone
Laravel demo to use custom locale and timezone middlewares 

This project demonstrates how to use two custom middlewares in Laravel to set 
the language and timezone for a service based on the parameters sent in the request headers.

## Requirements
PHP >= 8.1
Laravel >= 11.x
Composer

## Installation

1- Clone the repository:

```bash
git clone https://github.com/your-repo/laravel-middleware-language-timezone.git
```

2- Navigate into the project folder:

```bash
cd laravel-middleware-language-timezone
```

3- Install the dependencies using Composer:

```bash
composer install
```

4- Set up the environment file: Copy .env.example to .env and configure the environment variables as needed:

```bash
cp .env.example .env
```

5- Generate the application key:

```bash
php artisan key:generate
```

## Usage

This project includes two middlewares:

* **SetLocale**: Sets the language of the application based on the `Accept-Language` or `X-Language` header.
* **SetTimezone**: Sets the application's timezone based on the `X-Timezone` header.

## Sending the Headers

When making requests to the API or your application, include the following headers:
* `Accept-Language`: The language to be used by the application (e.g., `en`, `es`, `fr`).
* `X-Timezone`: The timezone to be set (e.g., `UTC`, `America/New_York`, `Europe/Madrid`).

## Example using curl:

### Received the welcome message in the language sending in the headers

**Request**:

```bash
curl -X GET http://localhost:8000/api/locale \
-H "Accept-Language: es" \
-H "X-Timezone: America/New_York"
```

**Response**:

```json
{
    "status": "OK",
    "message": "Bienvenido"
}
```

### Receive the current datetime transformed in the time zone sending in the headers

```bash
curl -X GET http://localhost:8000/api/timezone \
-H "X-Timezone: Europe/Madrid"
```

**Response**:

```json
{
    "status": "OK",
    "time": {
        "now": {
            "date": "2024-12-30 10:01:06.141854",
            "timezone_type": 3,
            "timezone": "America/New_York"
        },
        "utc": {
            "date": "2024-12-30 15:01:06.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "local_timezone": {
            "date": "2024-12-30 11:01:06.000000",
            "timezone_type": 3,
            "timezone": "Europe/Madrid"
        }
    }
}
```

**Postman collections**: [click me](src/docs/Middleware.postman_collection.json)
