# Tags

[![codecov](https://codecov.io/gh/EscolaLMS/Tags/branch/main/graph/badge.svg?token=ci4VPQbrOI)](https://codecov.io/gh/EscolaLMS/Tags)
[![phpunit](https://github.com/EscolaLMS/Tags/actions/workflows/test.yml/badge.svg)](https://github.com/EscolaLMS/Core/actions/workflows/test.yml)

## Features

The lib allows tags

- adding tags to each module
- edit and create multiple tags

See [Swagger](https://escolalms.github.io/Tags/) documented endpoints.

Some [tests](tests) can also be a great point of start.

To play the content you can use [EscolaLMS Tags](https://github.com/EscolaLMS/Tags)

## Install

1. `composer require escolalms/tags`
2. `php artisan migrate`

### Cors

All the endpoints need to be accesible from other domains, so [CORS](https://laravel.com/docs/8.x/routing#cors) must be properlly set.

Except of endpoints assets must expose CORS headers as well. You achive that by setting Apache/Nginx/Caddy/Whatever settings - below is example for Nginx for wildcard global access.

```
location ~* \.(eot|ttf|woff|woff2|jpg|jpeg|gif|png|wav|mp3|mp4|mov|ogg|webv)$ {
    add_header Access-Control-Allow-Origin *;
}
```

## Road map

- caching
- casading delete
- sql foreign keys indexing
- clearup task - deleting temp files, marked for delete 
