# php-code-challenge-currency-conversion
Laravel API for currency conversion

The project is created over https://laravel.com/docs/11.x#creating-a-laravel-project
The tech-stack will be 
 - Php8.3
 - Postgres
 - Redis
 - Mailpit
 - Adminer as DB client

We will use Docker so make sure its installed on our machine.

Note: to make the project up and running you should be familiar with docker essentials and the next commands.
To run the project all you need to do is:
```
    - cd currency-conversion-api
    - cp .env.example .env
    - ./vendor/bin/sail up
    - docker exec -it currency-conversion-api composer i
    - docker exec -it currency-conversion-api php artisan migrate --seed
```
Running artisan commands inside the container can be done with
```
    - docker exec -it currency-conversion-api bash
    - The artisan command you need...
```

# Packages / Third party services
- For powering the docker setup for the project https://laravel.com/docs/11.x/sail#main-content
- For providing the currency exchange like project module https://laravelmodules.com/ and following modular monolith architecture.
    - According to doc. this package offer module reusability even per projects. Ref. https://laravelmodules.com/docs/v11/publishing-modules

