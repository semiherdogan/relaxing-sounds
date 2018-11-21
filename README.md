# Rahatlatıcı sesler

**Rahatlatıcı Sesler** mobile application API.

* [API_URL] = https://example.com/api

#Installation
* `cp .env.example .env`
* `composer install`
* `php artisan key:generate`
* Update database info in .env file
* `php artisan migrate`

# Routes
* GET [API_URL]/app_status
* POST [API_URL]/register
* POST [API_URL]/login
* POST [API_URL]/logout
* GET [API_URL]/favorites
* POST [API_URL]/favorite/{soundId}
* DELETE [API_URL]/favorite/{soundId}
* GET [API_URL]categories
