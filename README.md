# URL Shortener System

A Laravel-based URL shortener system with role-based access control and multi-company support.

---

## Features

- Authentication (Login / Logout)
- Role-based authorization
- Multi-company architecture
- Invitation system
- Short URL generation
- Protected short URL redirection
- Pagination support
- Dashboard management
- Seeded demo data for testing

---

## Roles & Permissions

### SuperAdmin

- Can invite Admin users
- Can view all short URLs
- Cannot create short URLs

### Admin

- Can create short URLs
- Can invite Admin, Member, Manager, and Sales users within their own company
- Can only view short URLs not created within their own company

### Member

- Can create short URLs
- Can only view short URLs not created by themselves

### Manager

- Can view short URLs not created within their own company
- Cannot create short URLs

### Sales

- Can view short URLs not created by themselves
- Cannot create short URLs
---

## Tech Stack

* Laravel 12
* PHP
* MySQL
* Blade Templates

---

## Installation

Clone the repository:

```bash
git clone https://github.com/akshay-diwakar/laravel-url-shortner.git
```

Move into the project directory:

```bash
cd laravel-url-shortner
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Copy environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Configure database in `.env`

Run migrations and seeders:

```bash
php artisan migrate:fresh --seed
```

Start Vite development server:

```bash
npm run dev
```

Start development server:

```bash
php artisan serve
```

---

## Demo Credentials

SuperAdmin:

```text
Email: superadmin@example.com
Password: password
```

Admin:

```text
Email: admin1@example.com
Password: password
```

Member:

```text
Email: member1@example.com
Password: password
```

---

## Protected Short URLs

Short URLs are protected using authentication middleware.

Users must be logged in to access redirect routes.

Unauthenticated users are redirected to the login page.

---

## Short Code Design

Each shortened URL is represented using a unique `short_code`.

- Generated using random strings
- Ensured uniqueness via database checks
- Used as the lookup key for redirection

This approach improves security (prevents predictable URLs) and performance (indexed lookup).

---

## AI Usage Disclosure

The following AI tools were used for learning, debugging, and implementation guidance:

- Used Gemini to review database schema decisions and short code generation approaches.
- Used ChatGPT to understand invitation flow structure and role-based access handling.
- Used ChatGPT for debugging issues and improving form handling and UI structure.
- Used ChatGPT to help structure the project documentation (README).

Overall application logic, implementation, testing, and integration were completed manually.

