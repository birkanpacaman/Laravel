--------------------------------------------------------------------------
# Erdem Hospital – Medical Excellence
--------------------------------------------------------------------------

Sırasıyla kurulum ve çalıştıma kodları..

--------------------------------------------------------------------------
## Kurulum
--------------------------------------------------------------------------

$ laravel new

   _                               _
  | |                             | |
  | |     __ _ _ __ __ ___   _____| |
  | |    / _` |  __/ _` \ \ / / _ \ |
  | |___| (_| | | | (_| |\ V /  __/ |
  |______\__,_|_|  \__,_| \_/ \___|_|
-
 ┌ What is the name of your project? ───────────────────────────┐
 │ medical-excellence                                           │
 └──────────────────────────────────────────────────────────────┘
-
 ┌ Which starter kit would you like to install? ────────────────┐
 │ None                                                         │
 └──────────────────────────────────────────────────────────────┘
-
 ┌ Which testing framework do you prefer? ──────────────────────┐
 │ PHPUnit                                                      │
 └──────────────────────────────────────────────────────────────┘
-
 ┌ Do you want to install Laravel Boost to improve AI assisted coding? ┐
 │ No                                                                  │
 └─────────────────────────────────────────────────────────────────────┘
-
 ┌ Which database will your application use? ───────────────────┐
 │ MySQL                                                        │
 └──────────────────────────────────────────────────────────────┘
-
 ┌ Default database updated. Would you like to run the default database migrations? ┐
 │ No                                                                               │
 └──────────────────────────────────────────────────────────────────────────────────┘
-
 ┌ Would you like to run npm install and npm run build? ────────┐
 │ Yes                                                          │
 └──────────────────────────────────────────────────────────────┘
-

--------------------------------------------------------------------------
## Db Create Schema
--------------------------------------------------------------------------
Schema Name: medical_excellence
Chracter Set: utf8mb4
Collaction: utf8mb4_general_ci

CREATE SCHEMA `medical_excellence` DEFAULT CHARACTER SET utf8mb4;


--------------------------------------------------------------------------
## Model
--------------------------------------------------------------------------
$ cd medical-excellence/
$ php artisan make:model Consulation -m


--------------------------------------------------------------------------
## Migration
--------------------------------------------------------------------------
$ cd medical-excellence/

$ php artisan migrate
$ php artisan migrate:fresh -> all deleted!


--------------------------------------------------------------------------
## Controller
--------------------------------------------------------------------------
$ php artisan make:controller HomePageController


--------------------------------------------------------------------------
## Çalıştırma
--------------------------------------------------------------------------
$ cd medical-excellence/
$ php artisan serve

INFO  Server running on [http://127.0.0.1:8000].