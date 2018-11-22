# Rahatlatıcı sesler

**Rahatlatıcı Sesler** mobile application API.

* [API_URL] = https://example.com/api

# Installation
* `cp .env.example .env`
* `composer install`
* `php artisan key:generate`
* Update database info in .env file
* `php artisan migrate`

# Notes
* After successful login, header "X-Token" parameter should send with all requests with a value of user's api_token.

# Requests
* Register
```bash
curl --request POST \
 --url [API_URL]/register \
 --form appuid=xxxxx \
 --form app_version=1.12 \
 --form language_version=1.12 \
 --form app_language=en
```

* Login
```bash
curl --request POST \
    --url [API_URL]/login \
    --form appuid=xxxxx \
    --form app_version=1.2 \
    --form language_version=1.2
```

* Categories
```bash
curl --request GET \
  --url [API_URL]/categories \
  --header 'X-Token: XXXX'
```

* Sounds
```bash
curl --request GET \
  --url [API_URL]/categories/1 \
  --header 'X-Token: XXXX'
```

* Favorites
```bash
curl --request GET \
  --url [API_URL]/favorites \
  --header 'x-token: XXXX'
```

* Favorite ADD
```bash
curl --request POST \
  --url [API_URL]/favorites/1 \
  --header 'x-token: XXXX'
```

* Favorite REMOVE
```bash
curl --request DELETE \
  --url [API_URL]/favorites/1 \
  --header 'x-token: XXXX'
```

 # Error Codes
 * Can be found in [ErrorCodes.php](https://github.com/semiherdogan/relaxing-sounds/blob/master/app/Webservice/ErrorCodes.php)
 
 | errorCode | errorMessage |
 | :--- | :--- |
 | 0   | Success |
 | 2   | Api token invalid |
 | 10  | User not found |
 | 11  | User already exists |
 | 20  | Sound not found |
 | 30  | Invalid or missing parameters |
 | 404 | Api method not exists |
 | 405 | Http method not allowed |
 | 500 | Server error |
 