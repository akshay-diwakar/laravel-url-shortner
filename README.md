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

* Can invite Admin users in new companies
* Can view all short URLs
* Cannot create short URLs

### Admin

- Can create short URLs
- Can invite Admin and Member users within their own company
- Can only view URLs created within their own company

### Member

* Can create short URLs
* Can only view URLs created by themselves

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

Short URLs are protected behind authentication middleware.

Unauthenticated users cannot access redirect routes.

---

## Short Code Design

Each shortened URL is represented using a unique `short_code`.

- Generated using random strings
- Ensured uniqueness via database checks
- Used as the lookup key for redirection

This approach improves security (prevents predictable URLs) and performance (indexed lookup).

---

## AI Usage Disclosure

The following AI tools were used for guidance, debugging, and improving implementation quality:

* Used Gemini to review and enhance the database schema design (indexing, uniqueness, and data types).
* Used Gemini to understand short_code generation, uniqueness handling, and redirect logic.
* Used ChatGPT to resolve Git issues (e.g., unrelated histories) during repository setup.
* Used ChatGPT to implement role-based access control and protected URL redirection.
* Used ChatGPT to design and validate the invitation flow and related database relationships.
* Used ChatGPT for debugging issues and improving form handling and listing structure.
* Used ChatGPT to refine and structure project documentation (README).

Overall project architecture, implementation logic, testing, debugging, and integration were completed manually.

