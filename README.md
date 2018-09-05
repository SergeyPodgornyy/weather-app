# Weather app

Application to get weather about location, compare them and recommend location with the best weather.

### Deployment

```console
    cp .env.example .env
    composer install
    npm install
    npm run prod
```

**NOTE**: You need to set `OPEN_WEATHER_KEY` as environment variable to access OpenWeather API.

After that you can run

```console
    php artisan serve
```

Application will be available on `http://localhost:8000/`
