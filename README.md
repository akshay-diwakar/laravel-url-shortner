# URL Shortener System

A Laravel-based URL shortener system with role-based access control and company management.

---

## Features

* Authentication (Login / Logout)
* Role-based authorization
* Multiple companies support
* Invitation system
* Short URL generation
* Protected short URL redirection
* Pagination support
* Dashboard management

---

## Roles

### SuperAdmin

* Can invite Admin users in new companies
* Can view all short URLs
* Cannot create short URLs

### Admin

* Can create short URLs
* Can invite Admin and Member users in their own company
* Can only view URLs from their own company

### Member

* Can create short URLs
* Can only view URLs created by themselves

---

## Tech Stack

* Laravel 12
* PHP
* MySQL / SQLite
* Blade Templates

---

## Installation

Clone the repository:

```bash
git clone <your-github-repo-url>
```

Go into project folder:

```bash
cd project-name
```

Install dependencies:

```bash
composer install
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

Start development server:

```bash
php artisan serve
```

---

## SuperAdmin Credentials

```text
Email: superadmin@example.com
Password: password
```

---

## Protected Short URLs

Short URLs are protected behind authentication middleware.

Unauthenticated users cannot access redirect routes.

---

## AI Usage Disclosure

The following AI tools were used during development for learning, debugging, and implementation guidance:

Used Gemini to review and improve the database schema design, including indexing, uniqueness constraints, and data types.
Used Gemini to better understand short URL generation, short_code handling, uniqueness checks, and redirect flow.
Used ChatGPT for understanding and implementing role-based access control and protected short URL redirection.
Used ChatGPT to understand and implement the invitation flow and related database relationships.
Used ChatGPT for debugging issues and improving form and listing page structure.
Used ChatGPT to improve and structure the README documentation.


Overall project structure, logic, implementation, testing, and debugging were completed manually.
