# Ecommerce PHP MVC framework
# PHP 8.1.23

## Installation

1. Clone the project using git
2. Create database schema
3. Adjust database parameters into `.env` file (including schema name)
4. Optional: Run `composer install` (Already included `vendor` folder. If you want to generate new then remove `vendor` folder and Run `composer install`)
6. Go to the `public` folder 
7. Start php server by running command `php -S 127.0.0.1:8000` 
8. Open in browser http://127.0.0.1:8080

## Credential
Email: `admin@gmail.com`
password: `12345678`

#### Note:-
For Product - Category relationship:
  -- It can be a multiple as one product belongs in multiple category. (we can manage using new table (pivot one))
  -- But I just consider one product belongs in one category.

For Price & Inventory:
  -- I have added to product level currently.
  -- Actually, it suppoed to product options level as product available with different option like: size etc...