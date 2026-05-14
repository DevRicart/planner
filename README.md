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

2. Copy the `.env.example` file and configure the database connection
```
cp .env.example .env
```

3. Build and start the containers
```
docker compose up -d --build
```

4. Install PHP dependencies
```
docker compose exec app composer install
```

5. Generate the application encryption key
```
docker compose exec app php artisan key:generate
```

6. Run migrations and seed the database
```
docker compose exec app php artisan migrate
docker compose exec app php artisan db:seed
```