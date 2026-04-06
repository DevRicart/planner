<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></p>

## About Planner

Planner is a web application, made to organize the daily tasks of work and personal life.

## Technologies

- PHP
- Laravel
- Git and Github
- Tailwind
- JavaScript

## How to install

1. Clone the project

2. Copy .env.example (and point to a database)
```
cp .env.example .env
```

3. Install PHP dependencies
```
composer install
```

4. Generate encryption key
```
artisan key:generate
```

5. Create the tables in db and seed it
```
php artisan migrate
php artisan db:seed
```

6. install npm dependencies
```
npm install
```

7. compile the front-end archives and launch the local server
```
npm run dev
php artisan serve
```
