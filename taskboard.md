# 🏄 TAGHAZOUT SURF EXPO — Task Board

**Project:** Surf School Management System  
**Agency:** PixelCraft Agency  
**Client:** Taghazout Surf Expo

---

## 📅 Suggested Day-by-Day Plan (5 Days)

| Day | Focus | Status |
| :--- | :--- | :---: |
| **Day 1 (Mar 30)** | Epic 1 + 2 — Project Setup, MVC Structure, DB Schema | ✅ |
| **Day 2 (Mar 31)** | Epic 3 — OOP Classes, PDO Connection, Auth System (Base) | ✅ |
| **Day 3 (Apr 01)** | Epic 5 + 6 — Admin Dashboard (US2, US3) + Surfer Registration (US4) | [ ] |
| **Day 4 (Apr 02)** | Epic 7 + 8 — Student Calendar (US5) + Bonus Features (Router, Stats) | [ ] |
| **Day 5 (Apr 03)** | Epic 9 + 10 — Testing Phase, Bug Fixes, Documentation, Final Push | [ ] |

---

## 🟣 EPIC 1 — Project Setup & MVC Structure

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| ✅ | Create MVC folder structure (`/app`, `/config`, `/public`, `/database`, `/tests`) | 🔴 High | 20 min |
| ✅ | Create `/app` subfolders (`/controllers`, `/models`, `/views`, `/core`, `/middleware`) | 🔴 High | 10 min |
| ✅ | Create `/app/views` subfolders (`/admin`, `/student`, `/auth`, `/shared`) | 🔴 High | 10 min |
| ✅ | Set up single entry point `public/index.php` | 🔴 High | 15 min |
| ✅ | Start XAMPP — enable Apache + MySQL services; verify via `localhost` | 🔴 High | 5 min |
| ✅ | Open phpMyAdmin and create database `taghazout_surf_expo` with UTF-8 charset | 🔴 High | 10 min |
| ✅ | Initialize local Git repo with `.gitignore` (ignore `/vendor`, `.env`, etc.) | 🔴 High | 10 min |
| ✅ | Create GitHub remote repository and link to local | 🔴 High | 10 min |
| ✅ | Create basic `README.md` with project title, description, tech stack placeholder | 🟡 Medium | 15 min |
| ✅ | **Commit:** `"init: MVC project structure and environment setup"` | 🔴 High | 5 min |

---

## 🟣 EPIC 2 — Database Design & Schema

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| ✅ | Design ERD diagram showing `users`, `students`, `lessons` + relationships (draw on paper or tool) | 🔴 High | 30 min |
| ✅ | Write SQL to create `users` table (id, email, password, role [admin/student], created_at) | 🔴 High | 15 min |
| ✅ | Write SQL to create `students` table (id, user_id FK, name, country, level [Beginner/Intermediate/Advanced], payment_status, created_at) | 🔴 High | 20 min |
| ✅ | Write SQL to create `lessons` table (id, title, coach_name, session_date, session_time, created_at) | 🔴 High | 15 min |
| ✅ | Write SQL to create `lesson_registrations` linking table (id, student_id FK, lesson_id FK, registered_at) | 🔴 High | 15 min |
| ✅ | Add all Foreign Key constraints with ON DELETE CASCADE where appropriate | 🔴 High | 10 min |
| ✅ | Write seed data: 2 users (1 admin, 1 student), 5 students, 3 lessons, 6 registrations | 🟡 Medium | 25 min |
| ✅ | Export full SQL schema as `database/database.sql` and seeds as `database/seed.sql` | 🔴 High | 10 min |
| ✅ | **Commit:** `"feat(db): complete schema with users, students, lessons tables and seeds"` | 🔴 High | 5 min |

---

## 🟣 EPIC 3 — OOP Foundation & Models

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| ✅ | Create `config/db.php` with PDO connection constants/config | 🔴 High | 25 min |
| ✅ | Create `app/core/Model.php` base class with PDO connection and `getConnection()` method | 🔴 High | 20 min |
| ✅ | Create `app/core/Controller.php` base class with `loadView()` helper method | 🔴 High | 15 min |
| ✅ | Create `app/core/App.php` router/dispatcher class to map URLs to controllers | 🔴 High | 30 min |
| ✅ | Implement try/catch error handling in Model base class with meaningful messages | 🔴 High | 10 min |
| ✅ | Create `app/models/User.php` class with private properties (id, email, password, role) | 🔴 High | 20 min |
| ✅ | Add public getters/setters in User class with proper encapsulation | 🔴 High | 15 min |
| ✅ | Create `app/models/Student.php` class with private properties (id, userId, name, country, level, paymentStatus) | 🔴 High | 20 min |
| ✅ | Add public getters/setters and CRUD methods (create, read, update, delete) in Student class | 🔴 High | 30 min |
| ✅ | Create `app/models/Lesson.php` class with private properties (id, title, coach, date, time) | 🔴 High | 20 min |
| ✅ | Add public getters/setters and CRUD methods in Lesson class | 🔴 High | 25 min |
| ✅ | Test PDO connection with simple query in `tests/unit_tests.php` | 🔴 High | 10 min |
| ✅ | **Commit:** `"feat(models): OOP classes with encapsulation - User, Student, Lesson"` | 🔴 High | 5 min |

---

## 🟣 EPIC 4 — Authentication System (US1)

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| ✅ | Create `app/controllers/AuthController.php` with `login()`, `logout()`, `register()` actions | 🔴 High | 25 min |
| ✅ | Create `app/views/auth/login.php` with email/password form (clean HTML, no SQL!) | 🔴 High | 20 min |
| ✅ | Create `app/views/auth/logout.php` to handle session destruction and redirect | 🟡 Medium | 10 min |
| ✅ | Create `app/views/auth/registration.php` form (Name, Email, Password, Country, Level) | 🔴 High | 25 min |
| ✅ | Implement password verification using `password_verify()` against hashed DB password | 🔴 High | 20 min |
| ✅ | Implement PHP Sessions: start session, store user data (id, role) on successful login | 🔴 High | 15 min |
| ✅ | Create role-based redirection (Admin → dashboard, Student → my-agenda) | 🔴 High | 15 min |
| ✅ | Create `app/middleware/AuthMiddleware.php` to protect routes based on role | 🟡 Medium | 20 min |
| ✅ | Create `app/views/shared/header.php` with navigation (conditional based on role) | 🟡 Medium | 15 min |
| ✅ | Create `app/views/shared/footer.php` with copyright info | 🟢 Low | 10 min |
| ✅ | Add form validation: required fields, email format, XSS prevention (`htmlspecialchars`) | 🔴 High | 15 min |
| ✅ | **Commit:** `"feat(auth): secure login system with sessions and role-based access"` | 🔴 High | 5 min |

---

## 🟣 EPIC 5 — Admin Dashboard & Session Management (US2, US3)

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| [ ] | Create `app/controllers/AdminController.php` with `dashboard()`, `manageLessons()` actions | 🔴 High | 30 min |
| [ ] | Create `app/views/admin/dashboard.php` displaying all students in a table (no SQL in view!) | 🔴 High | 25 min |
| [ ] | Display all planned lessons/courses on dashboard with student count per session | 🔴 High | 20 min |
| [ ] | Create `app/views/admin/manage-lessons.php` form/page (Title, Coach, Date, Time) | 🔴 High | 20 min |
| [ ] | Implement lesson creation in AdminController using Lesson model | 🔴 High | 20 min |
| [ ] | Implement student assignment to lessons by level filter on `manage-lessons.php` | 🔴 High | 30 min |
| [ ] | Implement level filter dropdown (Beginner/Intermediate/Advanced) on `manage-lessons.php` | 🟡 Medium | 15 min |
| [ ] | Create `app/controllers/StudentController.php` with `editStudent()`, `updateLevel()` actions | 🔴 High | 20 min |
| [ ] | Implement student level update in StudentController (US3) | 🔴 High | 15 min |
| [ ] | Add payment status toggle (Paid/Pending) for each student on admin dashboard | 🟡 Medium | 15 min |
| [ ] | Add visual indicators: color badges for levels (Green/Yellow/Red) on dashboard | 🟢 Low | 15 min |
| [ ] | **Commit:** `"feat(admin): dashboard with full student/lesson management - US2, US3"` | 🔴 High | 5 min |

---

## 🟣 EPIC 6 — Student Registration & Profile (US4)

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| [ ] | Add `register()` action to `app/controllers/AuthController.php` | 🔴 High | 20 min |
| [ ] | Implement form validation on `app/views/auth/registration.php`: required fields, unique email, password strength | 🔴 High | 20 min |
| [ ] | Implement password hashing using `password_hash()` with `PASSWORD_BCRYPT` | 🔴 High | 10 min |
| [ ] | Create new User record with role='student' via User model | 🔴 High | 15 min |
| [ ] | Create linked Student record with profile data via Student model | 🔴 High | 15 min |
| [ ] | Display success message and redirect to login after registration | 🟡 Medium | 10 min |
| [ ] | Add `profile()` action to `app/controllers/StudentController.php` | 🟡 Medium | 15 min |
| [ ] | Implement profile edit (Name, Country only — level managed by Admin) | 🟢 Low | 20 min |
| [ ] | **Commit:** `"feat(student): self-registration system with profile creation - US4"` | 🔴 High | 5 min |

---

## 🟣 EPIC 7 — Student Calendar & Payment Status (US5)

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| [ ] | Add `myAgenda()` action in `app/controllers/StudentController.php` to fetch only current user's lessons | 🔴 High | 20 min |
| [ ] | Create `app/views/student/my-agenda.php` displaying list of upcoming registered lessons | 🔴 High | 25 min |
| [ ] | Display lesson details: Title, Coach, Date, Time in card/list format | 🔴 High | 15 min |
| [ ] | Implement payment status indicator: "Paid" (green badge) or "Pending" (red badge) | 🔴 High | 15 min |
| [ ] | Filter lessons to show only future dates (`WHERE session_date >= CURDATE()`) | 🟡 Medium | 15 min |
| [ ] | Add "No upcoming lessons" message if agenda is empty | 🟢 Low | 10 min |
| [ ] | Ensure students can ONLY see their own data (session-based filtering) | 🔴 High | 15 min |
| [ ] | Add CSS styles to `public/style/main.css` for agenda/calendar layout | 🟡 Medium | 20 min |
| [ ] | **Commit:** `"feat(student): personal agenda with payment status display - US5"` | 🔴 High | 5 min |

---

## 🟣 EPIC 8 — Bonus Features

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| [ ] | **BONUS: MVC Router** — Finalize `app/core/App.php` to handle clean URL routing | 🟡 Medium | 40 min |
| [ ] | Define route mapping in `app/core/App.php` (URLs → Controller/Action pairs) | 🟡 Medium | 20 min |
| [ ] | Verify `public/index.php` as single entry point parsing `REQUEST_URI` | 🟡 Medium | 25 min |
| [ ] | Add `.htaccess` in `public/` for clean URLs (RewriteEngine) | 🟡 Medium | 15 min |
| [ ] | **BONUS: Stats Dashboard** — Calculate average students per session | 🟡 Medium | 25 min |
| [ ] | Display stat card on `app/views/admin/dashboard.php`: "Average of X students per session" | 🟡 Medium | 15 min |
| [ ] | Add total counts on admin dashboard: Total Students, Total Lessons, Pending Payments | 🟢 Low | 20 min |
| [ ] | Add visual chart (simple CSS bar or basic JS chart) for occupancy | 🟢 Low | 30 min |
| [ ] | Add `LessonController.php` for lesson-specific CRUD operations if needed | 🟢 Low | 30 min |
| [ ] | **Commit:** `"feat(bonus): MVC router and dashboard statistics"` | 🟡 Medium | 5 min |

---

## 🟣 EPIC 9 — Testing Phase

### 🔵 User Story Validation Tests

| Done | Test Case | User Story | Expected Result | Actual Result | Status |
| :---: | :--- | :---: | :--- | :--- | :---: |
| [ ] | Admin logs in with valid credentials | US1 | Redirect to `admin/dashboard` with all students/lessons visible | | ⏳ |
| [ ] | Admin logs in with invalid credentials | US1 | Error message displayed, no access granted | | ⏳ |
| [ ] | Admin views `admin/dashboard` with all students listed | US1 | Complete student list with name, level, payment status | | ⏳ |
| [ ] | Admin views all planned courses on dashboard | US1 | All lessons with title, coach, date, time displayed | | ⏳ |
| [ ] | Admin creates new surf session via `admin/manage-lessons` | US2 | Lesson saved to DB, appears on dashboard | | ⏳ |
| [ ] | Admin assigns students to lesson by level filter | US2 | Selected students linked to lesson in registration table | | ⏳ |
| [ ] | Admin modifies student level (Beginner → Intermediate) | US3 | Level updated in DB, reflected on dashboard | | ⏳ |
| [ ] | Admin modifies student level (Intermediate → Advanced) | US3 | Level updated correctly | | ⏳ |
| [ ] | New surfer registers via `auth/registration` with complete profile | US4 | User + Student records created, redirect to login | | ⏳ |
| [ ] | Surfer registers with existing email | US4 | Error: "Email already exists" | | ⏳ |
| [ ] | Student logs in and views `student/my-agenda` | US5 | Only their registered lessons displayed | | ⏳ |
| [ ] | Student sees correct payment status (Paid/Pending) | US5 | Accurate badge displayed per their record | | ⏳ |

---

### 🔵 Security & Validation Tests

| Done | Test Case | Category | Expected Result | Actual Result | Status |
| :---: | :--- | :--- | :--- | :--- | :---: |
| [ ] | SQL Injection attempt in `auth/login` form | Security | Query fails safely, no data exposed | | ⏳ |
| [ ] | SQL Injection attempt in `auth/registration` form | Security | Prepared statement prevents injection | | ⏳ |
| [ ] | XSS attack via student name field | Security | Script tags escaped/neutralized | | ⏳ |
| [ ] | Direct URL access to `admin/dashboard` without login | Security | Redirect to login page via `AuthMiddleware` | | ⏳ |
| [ ] | Student tries to access admin routes | Security | Access denied, redirect to student area | | ⏳ |
| [ ] | Empty required fields on `auth/registration` | Validation | Error message for each empty field | | ⏳ |
| [ ] | Invalid email format on registration | Validation | "Invalid email format" error | | ⏳ |
| [ ] | Password hashing verification | Security | Stored password is hashed (not plain text) | | ⏳ |

---

### 🔵 Architecture & Code Quality Tests

| Done | Test Case | Category | Expected Result | Actual Result | Status |
| :---: | :--- | :--- | :--- | :--- | :---: |
| [ ] | Verify NO SQL queries in any View files under `app/views/` | MVC | Zero PDO/SQL in `/app/views` folder | | ⏳ |
| [ ] | Verify all Model properties in `app/models/` are private | Encapsulation | All properties declared as `private` | | ⏳ |
| [ ] | Verify Models have public getters/setters | Encapsulation | Public methods for data access | | ⏳ |
| [ ] | Verify Controllers in `app/controllers/` don't contain HTML | MVC | Controllers only process logic, return to views | | ⏳ |
| [ ] | Test `config/db.php` PDO connection via `tests/unit_tests.php` | OOP | Returns valid PDO instance | | ⏳ |
| [ ] | Verify `app/core/App.php` routes requests correctly to controllers | Architecture | URL dispatched to correct controller/action | | ⏳ |
| [ ] | Verify `app/middleware/AuthMiddleware.php` blocks unauthorized access | Architecture | Unauthenticated requests redirected to login | | ⏳ |
| [ ] | Verify proper file structure (`app/controllers`, `app/models`, `app/views`, `app/core`) | Architecture | All MVC folders properly separated | | ⏳ |

---

### 🔵 Bug Tracking Log

| Bug ID | Description | Severity | Steps to Reproduce | Status | Fix Applied |
| :---: | :--- | :---: | :--- | :---: | :--- |
| BUG-001 | | 🔴 High / 🟡 Med / 🟢 Low | | ⏳ | |
| BUG-002 | | | | ⏳ | |
| BUG-003 | | | | ⏳ | |
| BUG-004 | | | | ⏳ | |
| BUG-005 | | | | ⏳ | |

---

### 🔵 Edge Cases & Boundary Tests

| Done | Test Case | Expected Behavior | Status |
| :---: | :--- | :--- | :---: |
| [ ] | Lesson with 0 students registered | Display "No students registered" message on `manage-lessons.php` | ⏳ |
| [ ] | Student with no lessons assigned | `my-agenda.php` shows "No upcoming lessons" | ⏳ |
| [ ] | Create lesson with past date | Should be rejected or show warning | ⏳ |
| [ ] | Very long student name (100+ characters) | Truncated or validated before DB insert | ⏳ |

---

## 📁 Project File Structure Reference

```
SurfSchool-manager/
├── app/
│   ├── controllers/
│   │   ├── AdminController.php       ← Admin dashboard & lesson management
│   │   ├── AuthController.php        ← Login, logout, registration
│   │   ├── LessonController.php      ← Lesson-specific CRUD
│   │   └── StudentController.php     ← Student profile, agenda, level update
│   ├── core/
│   │   ├── App.php                   ← Router / dispatcher
│   │   ├── Controller.php            ← Base controller (loadView helper)
│   │   └── Model.php                 ← Base model (PDO connection)
│   ├── middleware/
│   │   └── AuthMiddleware.php        ← Role-based route protection
│   ├── models/
│   │   ├── Lesson.php
│   │   ├── Student.php
│   │   └── User.php
│   └── views/
│       ├── admin/
│       │   ├── dashboard.php         ← Admin dashboard (students + lessons)
│       │   └── manage-lessons.php    ← Create/assign lessons
│       ├── auth/
│       │   ├── login.php
│       │   ├── logout.php
│       │   └── registration.php
│       ├── shared/
│       │   ├── footer.php
│       │   └── header.php
│       └── student/
│           └── my-agenda.php         ← Student personal lesson calendar
├── config/
│   └── db.php                        ← PDO connection config
├── database/
│   ├── database.sql                  ← Schema (tables + FK constraints)
│   └── seed.sql                      ← Seed data (users, students, lessons)
├── public/
│   ├── index.php                     ← Single entry point
│   ├── img/                          ← Images/assets
│   └── style/
│       └── main.css                  ← Global stylesheet
└── tests/
    └── unit_tests.php                ← PDO + model unit tests
```