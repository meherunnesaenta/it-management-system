# GUB IT Service

Role-based IT service management platform for Green University of Bangladesh. The application manages support tickets, IT equipment, payments, notifications, and role-specific dashboards.

## Features

### Admin

- Real dashboard metrics from the database
- Ticket list, creation, editing, resolving, responses, and deletion
- Equipment inventory with create, edit, update, and delete actions
- Equipment category, serial number, location, warranty, status, and description
- User management page with assigned roles
- Reports page with live user, ticket, open-ticket, and equipment totals

### IT Staff

- Assigned-ticket dashboard
- Ticket status tracking
- Ticket assignment and resolution actions
- Ticket details and responses

### Student

- Personal dashboard with real ticket and payment totals
- Create and track support tickets
- View ticket details and close tickets
- Submit bKash or Nagad payment information
- View payment-related activity through notifications

### Shared Platform Features

- Laravel Breeze authentication
- `super-admin`, `it-staff`, and `student` roles
- Responsive sidebar, navbar, breadcrumb, and footer
- Database-backed notifications with unread count
- Notifications for new tickets, submitted payments, ticket assignment, and resolution
- Mark-all-as-read notification action
- Responsive Tailwind CSS interface

## Tech Stack

| Area | Technology |
| --- | --- |
| Backend | Laravel 12, PHP 8.2+ |
| Frontend | Blade, Tailwind CSS, Alpine.js |
| Database | SQLite by default; MySQL/MariaDB supported |
| Authentication | Laravel Breeze |
| Authorization | Spatie Laravel Permission |
| Assets | Vite, npm |
| Charts | Chart.js |

## Requirements

- PHP 8.2 or newer
- Composer
- Node.js and npm
- SQLite, MySQL, or MariaDB

## Installation

```bash
git clone https://github.com/your-username/gub-it-service.git
cd gub-it-service

composer install
npm install

# Create and configure the environment file
cp .env.example .env
php artisan key:generate

# Create the SQLite database if using the default configuration
# Windows PowerShell: New-Item database/database.sqlite -ItemType File

php artisan migrate
php artisan db:seed
npm run build
php artisan serve
```

Open `http://127.0.0.1:8000` in a browser.

For active frontend development, use two terminals:

```bash
php artisan serve
npm run dev
```

## Roles and Users

The database seeder creates roles and permissions only. It does not create fixed demo users or passwords.

New public registrations receive the `student` role automatically.

Create the first real administrator securely from the terminal:

```bash
php artisan admin:create
```

The command prompts for the administrator name, email, and password. An existing user can be promoted with Tinker:

```bash
php artisan tinker
```

```php
$user = App\Models\User::where('email', 'person@example.com')->first();
$user->assignRole('super-admin'); // or it-staff / student
```

## Main Routes

| Method | URL | Access |
| --- | --- | --- |
| GET | `/` | Public home |
| GET | `/dashboard` | Authenticated users |
| GET | `/admin/dashboard` | Super admin |
| GET | `/admin/tickets` | Super admin |
| GET | `/admin/equipments` | Super admin |
| GET | `/admin/users` | Super admin |
| GET | `/admin/reports` | Super admin |
| GET | `/it-staff/dashboard` | IT staff |
| GET | `/it-staff/tickets` | IT staff |
| GET | `/student/dashboard` | Student |
| GET | `/student/tickets` | Student |
| GET | `/student/payments/create` | Student |
| POST | `/student/payments` | Student |
| GET | `/profile` | Authenticated users |

## Payments

The current payment flow is a secure manual submission flow:

1. The student selects bKash or Nagad.
2. The student sends money to the configured merchant number.
3. The student submits the amount, purpose, and transaction ID.
4. The payment is stored as `pending`.
5. An administrator verifies it before it becomes `verified`.

Configure merchant numbers in `.env`:

```env
BKASH_MERCHANT_NUMBER=
NAGAD_MERCHANT_NUMBER=
```

This is not an automatic gateway checkout. Automatic bKash/Nagad checkout and server-side verification require approved merchant API credentials and callback configuration.

## Database Tables

- `users`
- `roles`, `permissions`, and Spatie pivot tables
- `tickets`
- `ticket_responses`
- `equipments`
- `payments`
- `notifications`

## Useful Commands

```bash
php artisan migrate
php artisan db:seed
php artisan admin:create
php artisan route:list
php artisan view:cache
php artisan test
npm run build
```

## Project Structure

```text
app/
├── Console/Commands/CreateAdmin.php
├── Http/Controllers/
│   ├── Admin/
│   ├── ITStaff/
│   ├── Student/
│   └── Auth/
├── Models/
├── Notifications/ActivityNotification.php
└── Services/PaymentService.php

database/
├── migrations/
└── seeders/

resources/views/
├── components/shared/
├── layouts/app.blade.php
└── pages/dashboard/

routes/web.php
```

## Testing

Run the complete test suite:

```bash
php artisan test
```

The project currently passes 25 tests and 61 assertions.

## Production Notes

- Set `APP_ENV=production` and `APP_DEBUG=false`.
- Use a production database and run migrations with `--force`.
- Never commit `.env` or payment API secrets.
- Replace manual payment submission with official bKash/Nagad merchant checkout APIs before accepting automated online payments.
- Configure HTTPS, mail delivery, backups, and queue workers before deployment.

## Author

**Meherun Nesa Enta**

- GitHub: [@meherunnesaenta](https://github.com/meherunnesaenta)
- Email: meherunnesaenta1@gmail.com

## License

MIT License.
