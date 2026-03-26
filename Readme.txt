# Laravel 12 CRUD Project

A simple **CRUD application** built with **Laravel 12** and **PHP 8.2**, allowing you to manage products with 
**image upload**, **status labels**, and full Create, Read, Update, Delete functionality.

---

## Features

- Add new products with `name`, `SKU`, `price`, `status`, and `image`.
- Edit and update existing products.
- Delete products with confirmation.
- Display products list with image preview and status label (Active/Inactive).
- Bootstrap 3 styling for UI.
- Validation for all fields, including unique SKU.
- Image upload supports: `jpeg`, `png`, `jpg`, `gif`, `webp`.
- Success messages after adding, updating, or deleting a product.

---
## Installation

1. **Clone the repository**

```bash
git clone https://github.com/globalbaba129/laravel12-crud.git
cd laravel12-crud

1. **Clone the repository**

```bash
git clone https://github.com/globalbaba129/laravel12-crud.git
cd laravel12-crud
Install dependencies
composer install
Copy environment file and generate app key
cp .env.example .env
php artisan key:generate
Configure database

Edit .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crud_app
DB_USERNAME=root
DB_PASSWORD=
Run migrations
php artisan migrate
Serve the application
php artisan serve

Visit http://127.0.0.1:8000
 in your browser.

