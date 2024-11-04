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
- in .env add the following keys
  - FIXER_EXCHANGE_RATES_CURRENCY_API_KEY=<access_key>
  - FIXER_EXCHANGE_RATES_CURRENCY_API_DOMAIN=https://data.fixer.io
- ./vendor/bin/sail up
- docker exec -it currency-conversion-api composer i
- docker exec -it currency-conversion-api php artisan module:migrate CurrencyConversion
- docker exec -it currency-conversion-api php artisan module:seed CurrencyConversion
```
Running artisan commands inside the container can be done with
```
- docker exec -it currency-conversion-api bash
- The artisan command you need...
```
Running test are run with: 
```
- docker exec -it currency-conversion-api php artisan test
```

# Packages / Third party services
- For powering the docker setup for the project https://laravel.com/docs/11.x/sail#main-content
- For providing the currency exchange like project module https://laravelmodules.com/ and following modular monolith architecture.
    - According to doc. this package offer module reusability even per projects. Ref. https://laravelmodules.com/docs/v11/publishing-modules

# API Postman collection
- https://api.postman.com/collections/4387865-4bccca9a-cea7-4f81-b7e1-280d1ff6e609?access_key=<ask_for_it>