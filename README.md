# 🚀IT Service & Asset Management Platform

> A complete, role-based IT support and asset management system for Green University of Bangladesh.

## 🌐 Live Demo
[🔗 View Live Demo](https://your-live-link.com) — *Coming Soon*

## 🎯 Key Features

### 👑 Admin Panel
- **Dashboard Analytics** — Real-time charts (Chart.js integration suggested)
- **User Management** — Create, edit, delete users with roles
- **Ticket Oversight** — View, assign, and resolve all tickets
- **Equipment Management** — Full CRUD with warranty tracking
- **Payment Verification** — Approve/reject mock Bkash/Nagad transactions
- **Report Generation** — Export PDF reports (DomPDF)

### 👨‍🔧 IT Staff Panel
- **Assigned Tickets** — View and manage your assigned tickets
- **Ticket Responses** — Add responses and update status
- **Equipment Assignment** — Assign equipment to users

### 🎓 Student Panel
- **Create Tickets** — Submit support requests with category & priority
- **My Tickets** — View ticket history and status
- **Make Payments** — Mock Bkash/Nagad payment for lab fees
- **Payment History** — View all transactions

### 🤖 AI-Powered Features (Planned)
- Smart ticket categorization (future)
- Auto-response suggestions
- Priority prediction

## 🛠️ Tech Stack

| Category | Technology |
|----------|------------|
| Backend | Laravel 12 (PHP 8.2+) |
| Frontend | Blade + Tailwind CSS + DaisyUI |
| Database | MySQL / MariaDB |
| Auth | Laravel Breeze (recommended) |
| Authorization | Spatie Permission (roles) |
| Charts | Chart.js |
| PDF | DomPDF |
| Assets | Vite + npm |
| Version Control | Git + GitHub |

## 📁 Project Structure

```text
gub-it-service/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── TicketController.php
│   │   │   │   └── EquipmentController.php
│   │   │   ├── Student/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── TicketController.php
│   │   │   │   └── PaymentController.php
│   │   │   └── ITStaff/
│   │   │       └── TicketController.php
│   │   └── Middleware/
│   │       └── RoleMiddleware.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Ticket.php
│   │   ├── Equipment.php
│   │   ├── Payment.php
│   │   └── TicketResponse.php
│   └── Services/
│       └── PaymentService.php
├── database/
│   ├── migrations/
│   │   ├── ..._create_tickets_table.php
│   │   ├── ..._create_equipments_table.php
│   │   └── ..._create_payments_table.php
│   └── seeders/
│       ├── RoleSeeder.php
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── pages/
│       │   ├── home.blade.php
│       │   └── dashboard/
│       │       ├── admin/
│       │       ├── student/
│       │       └── it-staff/
│       └── components/
├── routes/
│   └── web.php
├── public/
│   └── images/
├── .env.example
├── composer.json
└── package.json
```

## 📋 Database Schema

| Table | Description |
|-------|-------------|
| `users` | All users with role (admin, it-staff, student) |
| `tickets` | Support tickets with status, priority, category |
| `equipments` | IT assets with serial, warranty, location |
| `payments` | Payment records with transaction ID |
| `ticket_responses` | Responses and updates on tickets |

## 🚀 Quick Installation

```bash
# 1. Clone the repository
git clone https://github.com/your-username/gub-it-service.git
cd gub-it-service

# 2. Install PHP dependencies
composer install

# 3. Install frontend dependencies
npm install

# 4. Environment setup
cp .env.example .env
php artisan key:generate

# 5. Configure your database in .env
# DB_DATABASE=gub_it_service
# DB_USERNAME=root
# DB_PASSWORD=

# 6. Run migrations & seeders
php artisan migrate --seed

# 7. Build frontend assets
npm run build
# OR for development (with hot-reload)


# 8. Start Laravel server
php artisan serve

# 9. Visit: http://localhost:8000
```

## 🔑 Demo Credentials

| Role | Email | Password |
|------|-------|----------|
| Super Admin | admin@example.com | password |
| IT Staff | staff@example.com | password |
| Student | student@example.com | password |

> Please change these after seeding or in production.

## 📊 API Endpoints (Sample)

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/` | Home page |
| GET | `/dashboard` | Role-based dashboard |
| GET | `/admin/tickets` | Admin ticket list |
| POST | `/admin/tickets` | Create ticket |
| PUT | `/admin/tickets/{id}` | Update ticket |
| GET | `/student/tickets` | Student ticket list |
| POST | `/student/payments` | Make payment |
| GET | `/reports/pdf` | Generate PDF report |

## 🎨 Screenshots

Add screenshots after deployment or in `docs/screenshots/`.

## 🧪 Testing

```bash
php artisan test
```

## 🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss the change.

## 📄 License

MIT License — see the `LICENSE` file for details.

## 👤 Author

**Meherun Nesa Enta**

- GitHub: [@meherunnesaenta](https://github.com/meherunnesaenta)
- Email: meherunnesaenta1@gmail.com

---

## ⭐ Future Scope

- Real-time notifications (Laravel Echo + Pusher)
- REST API with Sanctum / API tokens
- QR code for equipment
- AI-powered ticket categorization
- Email notifications / scheduled reports
- PWA / mobile-responsive improvements

If you'd like, I can also add a separate `client/README.md` that matches the exact microtask React template (Stripe, ImgBB, frontend structure). Tell me which one you want next.
