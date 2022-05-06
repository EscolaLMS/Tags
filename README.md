# Tags
Package Tagging for any Module

[![swagger](https://img.shields.io/badge/documentation-swagger-green)](https://escolalms.github.io/Tags/)
[![codecov](https://codecov.io/gh/EscolaLMS/Tags/branch/main/graph/badge.svg?token=ci4VPQbrOI)](https://codecov.io/gh/EscolaLMS/Tags)
[![phpunit](https://github.com/EscolaLMS/Tags/actions/workflows/test.yml/badge.svg)](https://github.com/EscolaLMS/Tags/actions/workflows/test.yml)
[![downloads](https://img.shields.io/packagist/dt/escolalms/tags)](https://packagist.org/packages/escolalms/tags)
[![downloads](https://img.shields.io/packagist/v/escolalms/tags)](https://packagist.org/packages/escolalms/tags)
[![downloads](https://img.shields.io/packagist/l/escolalms/tags)](https://packagist.org/packages/escolalms/tags)
[![Maintainability](https://api.codeclimate.com/v1/badges/f235cc5ffdde4318a4a0/maintainability)](https://codeclimate.com/github/EscolaLMS/Tags/maintainability)


## What does it do

This package have a tags which you can add to models in EscolaLms.

- adding tags to each module
- edit and create multiple tags

## Installing

- `composer require escolalms/tags`
- `php artisan migrate`
- `php artisan db:seed --class="EscolaLms\Tags\Database\Seeders\TagsPermissionSeeder"`

## Endpoints

All the endpoints are defined in [![swagger][![swagger](https://img.shields.io/badge/documentation-swagger-green)](https://escolalms.github.io/Tags/)

## Tests

Run `./vendor/bin/phpunit --filter=Tags` to run tests. See [tests](tests) folder as it's quite good staring point as documentation appendix.

Test details [![codecov](https://codecov.io/gh/EscolaLMS/Tags/branch/main/graph/badge.svg?token=ci4VPQbrOI)](https://codecov.io/gh/EscolaLMS/Tags) [![phpunit](https://github.com/EscolaLMS/Tags/actions/workflows/test.yml/badge.svg)](https://github.com/EscolaLMS/Tags/actions/workflows/test.yml)

## Permissions

Permissions are defined in [seeder](vendor/escolalms/tags/database/seeders/TagsPermissionSeeder.php)

## Database relation

1. `Morphable` Tags is related morphable with other models
```
Tags n -> n Other models
```

