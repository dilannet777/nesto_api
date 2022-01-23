## Build a REST API  for Nesto Developer Test Project

This example shows how to build the industry level REST APIs using Laravel Repository Pattern.

This design patern appliable to any application based on MVC.

The use of Repository Pattern has many benefits, below is a list of the most important ones:

    * Centralization of the data access logic makes code easier to maintain
    * Business and data access logic can be tested separately
    * Reduces duplication of code
    * A lower chance for making programming errors

**Prerequisites:** PHP 7.4, Composer, MySQL


### Getting Started

Clone this project using the following commands:

```
mkdir nesto_api
git clone https://github.com/dilannet777/nesto_api.git nesto_api

```

### Configure the application

Copy and edit the `.env` file and enter your database details:

```
cp .env.example .env
```

Install the project dependencies and start the PHP server:

```
composer install
php artisan config:cache
php artisan serve
```

### Run the apis via curl

Get the Latest Currency List

```
curl --location --request GET 'https://127.0.0.1:8000/api/latest/{currency code}'

Note: You can replace {currency code} from any currency code like USD, EUR, LKR, etc
Example: curl --location --request GET 'https://nestoapi.codesands.com/api/latest/usd'
```
Convert monetary value form source currency to target currency.

```
curl --location --request POST 'http://127.0.0.1:8000/api/convert' \
--form 'from="USD"' \
--form 'to="LKR"' \
--form 'amount="10"'
```
