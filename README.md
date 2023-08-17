# Laravel-Vue-WeatherApp

A simple application that demonstrates the use of Vue.js and Laravel to create an interactive weather app.

## Getting started

### Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Before starting, you will need an API key from [OpenWeather](https://openweathermap.org/appid). The key will be used in the configuration files.

Clone the repository

    git clone https://github.com/webgently/laravel-vue-weather-app.git

Switch to the repo folder

    cd laravel-vue-weather-app

Install all the dependencies using composer

    composer install
    
Install all the style modules

    yarn install or npm install

Copy the example env file and make the required configuration changes in the .env file

    rename .env.example .env

Add your API key from OpenWeather to the .env file

    OPENWEATHER_API_KEY={your api key here}

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)
    
Create the database named "weather"

In the .env file update the DB name and credentials

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=weather
    DB_USERNAME=homestead
    DB_PASSWORD=secret

Then run the migration:

    php artisan migrate

Start the local development server

    php artisan serve

Start the local development frontend

    yarn run dev or npm run dev

You can now access the server at http://localhost:8000

**TLDR command list**

    git clone https://github.com/webgently/laravel-vue-weather-app.git
    cd laravel-vue-weather-app
    composer install
    yarn install
    rename .env.example .env
    php artisan key:generate
    **Create the database named "weather"**
    In the .env file update the DB name and credentials
    php artisan migrate
    php artisan serve

**Unit command list**

    php artisan test --filter SignUpTest
    php artisan test --filter SignInTest
    php artisan test --filter LogOutTest
    php artisan test --filter GetWeatherTest
