# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

PHP-based e-commerce site for a bakery ("Dulces Juliana") built with vanilla PHP, MySQL, HTML, CSS, and JavaScript. Uses session-based authentication and integrates MercadoPago for payments.

## Architecture

### Directory Structure
- `index.php` - Main landing page with product showcase (first 4 products)
- `products.php` - Full product catalog
- `login/` - Authentication (login.php, register.php)
- `pages/` - User-facing pages (checkout, cart management, product APIs)
- `CRUD/` - Admin operations (add/edit/delete products, send confirmation emails)
- `php/` - Backend utilities (conexion.php for database connection)
- `Scripts/` - Frontend JavaScript (script.js for cart logic, login.js, register.js)
- `Styles/` - CSS (Style.css, Login.css)
- `Sources/` - Static assets (images, logo)

### Database Schema
Tables: `productos`, `carrito`, `carritos_users`, `usuarios`

### Key Technologies
- **Backend**: PHP with MySQLi (prepared statements)
- **Database**: MySQL (configured in `php/conexion.php`)
- **Dependencies**: PHPMailer (email), MercadoPago SDK (payments)
- **Frontend**: jQuery, AOS (animations), Font Awesome icons, Bootstrap (login forms)

## Development Commands

### Install Dependencies
```bash
composer install
```

### Running the Application
- Requires XAMPP or local PHP+MySQL server
- Database: `ecommerce` on `127.0.0.1:3307` (configured in `php/conexion.php`)
- Access via `http://localhost/e-commerce-page/`

## Key Patterns

### Authentication Flow
- Sessions managed via `$_SESSION['user_id']` and `$_SESSION['user_name']`
- Admin user identified by username "lionel"
- Cart tied to user session through `carritos_users` table

### Cart System
- Products added to `carrito` table linked to user's cart ID
- Cart operations: `agregar_al_carrito.php`, `borrar_item.php`, `actualizar_cantidad.php`, `obtener_productos.php`
- Checkout via `pages/comprar.php` with payment method selection (efectivo/MercadoPago)

### Payment Integration
- Efectivo: Sends order confirmation email via PHPMailer (`CRUD/send_email.php`)
- MercadoPago: Redirects to `preparar_mercadopago.php` / `CobroMercadoPago.php`

### Product Management
- Admin-only product creation via `CRUD/agregar_producto.php` (file upload + database insert)
- Products table: `id`, `nombre`, `imgURL`, `descripcion`, `categoria`, `precio`, `stock`

## External Services

### Email (PHPMailer)
- SMTP: Gmail (`smtp.gmail.com:587` with STARTTLS)
- Credentials configured in `CRUD/send_email.php`

### Payment (MercadoPago)
- SDK: `mercadopago/dx-php` 3.0.0
- Preference creation and checkout flow in `pages/preparar_mercadopago.php` and `pages/CobroMercadoPago.php`
