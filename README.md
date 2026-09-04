# 🚀 GUB IT Service — Micro Task & IT Service Platform

A role-based IT service and asset management platform built for Green University of Bangladesh. This repository contains Laravel backend scaffolding (models, migrations, controllers) and Blade views to manage tickets, equipment, payments, and role-based dashboards.

## 🌐 Live Site
Not deployed yet (local development). Update this URL when you deploy.

## 👑 Admin Credentials (dev)
- **Email:** admin@example.com
- **Password:** password

> Replace the dev credentials after seeding users in production.

## ✨ Key Features

### For Users (Students / Staff):
- Browse and create support tickets
- View ticket status and responses
- View assigned equipment and submit requests

### For IT Staff:
- View and manage assigned tickets
- Respond to tickets and change status
- Manage equipment inventory

### For Admin:
- Manage users and roles
- Oversee all tickets, equipment, and payments
- Process mock payment records and view reports

### General:
- Role-based access control (via `spatie/laravel-permission` optional)
- Blade templates with Vite-built assets
- Seeders and migrations included for core models

## 🏗️ Project Structure (important parts)

```
app/
	Http/
		Controllers/
			Auth/
			Dashboard/
			TicketController.php
	Models/
		User.php
		Ticket.php
		Equipment.php
database/
	migrations/
	seeders/
resources/
	views/
		layouts/
		pages/
public/
	build/   # Vite output
```

## Frontend / Backend

- Frontend build: Vite (npm)
- Backend: Laravel (PHP)

## 📦 Installation Guide

### Prerequisites
- PHP 8+
- Composer
- Node.js & npm
- A database (MySQL/Postgres/SQLite)

### Quick Start

```bash
git clone <repo-url>
cd gub-it-service
cp .env.example .env
php artisan key:generate
composer install
npm install
npm run dev   # or npm run build
php artisan migrate
php artisan db:seed
php artisan serve
```

### .env (example values)

```
APP_NAME=GUB_IT_Service
APP_ENV=local
APP_KEY=base64:...
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gub_it
DB_USERNAME=root
DB_PASSWORD=

VITE_URL=http://127.0.0.1:5173
```

## 📋 Useful Commands

- Install deps: `composer install`, `npm install`
- Build assets: `npm run dev` or `npm run build`
- Run migrations: `php artisan migrate`
- Seed demo data: `php artisan db:seed`
- Serve app: `php artisan serve`

## 📄 Example API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/` | Home page |
| GET | `/dashboard` | Role-based dashboard |
| GET | `/tickets` | List tickets |
| POST | `/tickets` | Create ticket |
| POST | `/auth/login` | Login (if using custom auth controllers) |

## 🔑 Test Credentials

- Admin: `admin@example.com` / `password` (dev)

## 📂 Repo Links
- This repo: (local workspace)

## 📄 License
MIT

---

If you want the README to match the microtask example exactly (including frontend React structure and Stripe/ImgBB instructions), tell me and I will add a separate `client/` README or a full frontend README as well.
