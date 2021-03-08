# Article Rest Api

## Description

Article Rest Api is a simple api that uses Sanctum!

## What I learned

How to use Laravel Sanctum to authenticate users request Laravel Sanctum an API!

## Endpoints

Obs: To user this API properly, you need to set a header called Accept with the value application/json

| Method | Path          | Parameters            |
| ------ | ------------- | --------------------- |
| Post   | /api/articles | email, password       |
| Post   | /register     | name, email, password |

In order to use any of the following path, you must have an Authorization header with the value: Bearer + token

| Method | Path               | Parameters  |
| ------ | ------------------ | ----------- |
| Get    | /api/articles/     | ---         |
| Get    | /api/articles/{id} | id          |
| Post   | /api/articles/     | title, body |
| Put    | /api/articles{id}  | title, body |
| Delete | /api/articles/{id} | id          |

## Requirements

-   php: ^8.0
-   Laravel: ^8.0
-   Composer
-   ext-pdo: \*

### Project Set up

1. First you need to clone this repo or download the zip and extract!
2. cd/get into your project
3. Install Composer Dependencies

```
composer install
```

4. Install NPM Dependencies

```
npm install
```

5. Create a copy of your .env file

```
cp .env.example .env
```

6. Generate an app encryption key

```
php artisan key:generate
```

7. Create an database for the application, and in the .env file, add database information
8. Migrate the database and seed the database

```
php artisan migrate --seed
```
