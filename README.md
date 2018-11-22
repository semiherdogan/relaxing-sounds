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
* GET [API_URL]/categories
* GET [API_URL]/categories/{categoryId}
* GET [API_URL]/favorites
* POST [API_URL]/favorite/{soundId}
* DELETE [API_URL]/favorite/{soundId}

# Notes
* After successful login header "X-Token" parameter should send with all requests with a value of users api_token.

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
 