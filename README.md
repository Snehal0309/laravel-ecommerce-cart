# Laravel Ecommerce Cart

A simple ecommerce app built with Laravel that supports:
- Product listing
- Cart functionality
- Orders management (Admin & User)
- REST APIs with Postman collection

---

## Requirements
- PHP >= 8.0
- MySQL >= 8.0
- Composer
- Laravel >= 10

---

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/YOUR_USERNAME/laravel-ecommerce-cart.git
   cd laravel-ecommerce-cart
   
## Install dependencies:

composer install
npm install && npm run dev


Configure .env:
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

## Import Database:

Go to phpMyAdmin → Import → Upload database/laravel.sql.

Run migrations (if needed):

php artisan migrate

Run the server:

php artisan serve


## Access the app:

Frontend: http://127.0.0.1:8000

Admin: /admin/products, /admin/orders



## API Documentation

Postman collection available in postman_collection.json.

Example:

Add to Cart: POST /api/cart/add

{
  "product_id": 1
}


View Cart: GET /api/cart

Place Order: POST /api/orders

## Exception Handling

All API endpoints are wrapped with try...catch to prevent crashes.
