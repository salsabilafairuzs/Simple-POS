<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Project Description

This project is a simple Point of Sale (POS) system designed for small to medium-sized businesses. I created this system to fulfill the administrative requirements where the available features are very simple and there are only 3 tables. This project is only as a result of working on the challenge that has been given so it is not recommended to use it again. This project could be used in the future with the addition of more complex features.

## Key Feature:
- Dashboard with summary of total categories and products
- Category management (CRUD operations) + Search feature
- Product management (CRUD operations) + Search feature
- RESTful API for integration

## Database Design

## Sceenshot Aplikasi 

## Dependency
1. PHP 7.4
2. Laravel 8
3. MySQL
4. Bootstrap 5
5. Node.js and NPM (for compiling assets)

## Installation

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure your database
4. Run `php artisan key:generate`
5. Run `php artisan migrate --seed`
6. Run `npm install && npm run dev`

## API Endpoints
### Category Endpoints

| Method      | Endpoint                   | Description                               |
|-------------|----------------------------|-------------------------------------------|
| POST        | `/api/kategori/api`        | Create a new category                     |
| GET         | `/api/kategori/api`        | Retrieve all categories                   |
| POST        | `/api/kategori/api/search` | Search categories                         |
| DELETE      | `/api/kategori/api/{api}`  | Delete a specific category                |
| PUT/PATCH   | `/api/kategori/api/{api}`  | Update a specific category                |
| GET         | `/api/kategori/api/{api}`  | Retrieve details of a specific category   |

### Product Endpoints

| Method      | Endpoint                  | Description                              |
|-------------|---------------------------|------------------------------------------|
| POST        | `/api/produk/api`         | Create a new product                     |
| GET         | `/api/produk/api`         | Retrieve all products                    |
| POST        | `/api/produk/api/search`  | Search products                          |
| DELETE      | `/api/produk/api/{api}`   | Delete a specific product                |
| PUT/PATCH   | `/api/produk/api/{api}`   | Update a specific product                |
| GET         | `/api/produk/api/{api}`   | Retrieve details of a specific product   |

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
