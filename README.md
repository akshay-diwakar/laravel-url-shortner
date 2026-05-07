# URL Shortener System

A Laravel-based URL shortener system with role-based access control and company management.

---

## Features

* Authentication (Login / Logout)
* Role-based authorization
* Multi-company support with isolated data per company
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
* Can only view URLs created by them

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

All core logic, implementation, and testing were done independently.

