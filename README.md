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

Create User
```
curl --location --request POST 'http://127.0.0.1:8000/api/register' \
--form 'name="Dilan Withanachchi"' \
--form 'email="test@mailinator.com"' \
--form 'password="1qaz2wsx"' \
--form 'password_confirmation="1qaz2wsx"'
```
Login User
```
curl --location --request POST 'http://127.0.0.1:8000/api/login' \
--form 'email="test@mailinator.com"' \
--form 'password="1qaz2wsx"''
```

Active Vehicle List
```
curl --location --request POST 'http://127.0.0.1:8000/api/vehicles?page_count=10' \
--header 'Authorization: Bearer 25|VDrX4eza53atcuSS4QJYEonYLFRdAvz2bhsIcL9w' \
--header 'Accept: application/json'
```

Show Vehicle Log Count
```
curl --location --request POST 'http://127.0.0.1:8000/api/vehicle/logcount/82' \
--header 'Authorization: Bearer 25|VDrX4eza53atcuSS4QJYEonYLFRdAvz2bhsIcL9w' \
--header 'Accept: application/json' \
--form 'page_count="5"'
```

Show Vehicle Last Log Information
```
curl --location --request GET 'http://127.0.0.1:8000/api/vehicle/lastlog/82' \
--header 'Authorization: Bearer 25|VDrX4eza53atcuSS4QJYEonYLFRdAvz2bhsIcL9w' \
--header 'Accept: application/json'
```

