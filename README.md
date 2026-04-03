# 🏄 SurfSchool Manager — Surf Session Management System

> A comprehensive web application for managing surf school operations. Built with PHP using MVC architecture and OOP principles to streamline student registrations, lesson scheduling, and payment tracking for Taghazout Surf Expo.

---

## 🛠️ Tech Stack

| Layer       | Technology                              |
|-------------|-----------------------------------------|
| Backend     | PHP 8+                                  |
| Database    | MySQL / MariaDB                         |
| DB Access   | PDO + Prepared Statements               |
| Auth        | PHP Sessions + `password_hash()`        |
| Architecture| MVC (Model-View-Controller)            |
| Programming | OOP with Encapsulation                  |
| Frontend    | HTML5 / CSS3 (Vanilla)                  |

---

## ✨ Features

### 👑 Manager (Administrator Access)
- 🔐 **Secure Login** — Register/Login with hashed passwords
- 📊 **Dashboard** — View all students and planned courses at a glance
- 📅 **Session Management** — Create surf sessions (Title, Coach, Date/Time)
- 🎓 **Student Registration** — Register students to lessons by level
- 📈 **Level Management** — Modify student levels (Beginner, Intermediate, Advanced)
- 📉 **Occupancy Stats** — Display average course occupancy rate

### 🏄 Surfer (Customer Access)
- ✍️ **Self-Registration** — Create profile (Name, Country, Self-Assessed Level)
- 📅 **My Calendar** — View upcoming classes
- 💳 **Payment Status** — Check payment status (Paid/Pending)

---

## 🗄️ Database Schema

```markdown
users
├── id (PK)
├── email
├── password
├── role (ENUM: admin/student)
└── created_at

students
├── id (PK)
├── user_id (FK → users.id)
├── full_name
├── country
├── level (ENUM: Beginner/Intermediate/Advanced)
└── phone

lessons
├── id (PK)
├── title
├── coach_name
├── lesson_date
├── max_capacity
└── created_at

lesson_registrations
├── student_id (FK → students.id)
├── lesson_id (FK → lessons.id)
├── payment_status (ENUM: Pending/Paid)
└── registered_at
```

### Tables & Their Columns

- **users** — Authentication table. Stores email and password for both Admins and Students. Role is an ENUM so no separate admin table needed.

- **students** — Profile table with extra details like Name, Country, and Skill Level. Links to users via `user_id` foreign key.

- **lessons** — Schedule table for surf sessions. Created by Admins with title, coach, date/time, and capacity.

- **lesson_registrations** — Many-to-Many join table linking students to lessons. Includes payment status for tracking.

#### Relationships (Crows Foot Notation)

- users → students : one user can have one student profile (||--||)
- students → lesson_registrations : one student can enroll in many lessons (||--o{)
- lessons → lesson_registrations : one lesson can have many students (||--o{)

---

## 📊 Schema Visualisation

![schema visualisation](./public/img/tables_diagram.png)

---

## 🚀 Installation

### Prerequisites

- PHP 8+ with PDO extension enabled
- MySQL 5.7+ or MariaDB
- A local server (XAMPP, WAMP, Laragon, or similar)

### Steps

1. **Clone the repository**

```bash
git clone https://github.com/Ayouub-aj/SurfSchool-manager.git
cd SurfSchool-manager
```

2. **Import the database**
   - Open phpMyAdmin (or your MySQL client)
   - Create a new database: `surf_school`
   - Import: `database/database.sql`
   - Import seed data: `database/seed.sql`

3. **Configure the connection**
   - Open `config/db.php`
   - Update with your local credentials:

```php
$host = 'localhost';
$db   = 'surf_school';
$user = 'root';
$pass = '';
```

4. **Run the project**
   - Place the folder in your server's `htdocs` or `www` directory
   - Start PHP server:
   ```bash
   php -S localhost:8000 -t public
   ```
   - Visit: `http://localhost:8000`

---

## 📁 Project Structure

```markdown
SurfSchool-manager/
├── app/
│   ├── controllers/
│   │   ├── AdminController.php
│   │   ├── AuthController.php
│   │   ├── LessonController.php
│   │   └── StudentController.php
│   ├── core/
│   │   ├── App.php              # Router & Request handling
│   │   ├── Controller.php       # Base controller class
│   │   └── Model.php            # Base model class (PDO)
│   ├── middleware/
│   │   └── AuthMiddleware.php   # Authentication & Role checks
│   ├── models/
│   │   ├── Lesson.php
│   │   ├── Student.php
│   │   └── User.php
│   └── views/
│       ├── admin/
│       │   ├── dashboard.php
│       │   └── manage-lessons.php
│       ├── auth/
│       │   ├── login.php
│       │   ├── logout.php
│       │   └── registration.php
│       ├── shared/
│       │   ├── footer.php
│       │   └── header.php
│       └── student/
│           └── my-agenda.php
├── config/
│   └── db.php                   # Database connection
├── database/
│   ├── database.sql             # Schema formation
│   └── seed.sql                 # Demo data
├── public/
│   ├── index.php                # Single entry point
│   ├── style/
│   │   └── main.css
│   └── img/
│       └── tables_diagram.png   # Database ERD
├── tests/
│   └── unit_tests.php
├── .gitignore
├── LICENSE
├── mvc_structure_creator.sh      # Setup script
├── README.md
└── taskboard.md                 # Project roadmap & progress
```

---

## 🔒 Security Highlights

- 🔐 **Password Hashing** — Uses `password_hash()` / `password_verify()`
- 🛡️ **Zero SQL Injection** — All queries use PDO Prepared Statements
- ✅ **Server-side Validation** — Strict form validation on all inputs
- 🔒 **Session-based Auth** — Role-based access control via Middleware
- 🚫 **No SQL in Views** — Clean separation of concerns (MVC)

---

## 📊 User Stories

| ID  | Description                                                                   | Actor    | Status |
|-----|-------------------------------------------------------------------------------|----------|--------|
| US1 | Log in to access dashboard displaying all students and planned courses      | Manager  | ✅      |
| US2 | Create surf session and register students according to their level          | Manager  | ✅      |
| US3 | Modify student level (Beginner, Intermediate, Advanced)                     | Manager  | ✅      |
| US4 | Create profile (Name, Country, Self-Assessed Level)                         | Surfer   | ✅      |
| US5 | View upcoming classes and check payment status                               | Surfer   | ✅      |

---

## 🖼️ Screenshots

![login](/public/img/login.png)
![dashboard](/public/img/dashboard.png)
![manage-lessons](/public/img/manage-lessons.png)
![student-agenda](/public/img/student-agenda.png)

---

## 👤 Author

 — Built as part of a Full-Stack PHP/MySQL project at PixelCraft Agency.

**Client:** Taghazout Surf Expo  
**Agency:** PixelCraft Agency  
**Date** April 3, 2026