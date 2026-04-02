# 🏄 TAGHAZOUT SURF EXPO — Task Board

**Project:** Surf School Management System  
**Agency:** PixelCraft Agency  
**Client:** Taghazout Surf Expo

---

## 📅 Suggested Day-by-Day Plan (5 Days)

| Day | Focus | Status |
| :--- | :--- | :---: |
| **Day 1 (Mar 30)** | Epic 1 + 2 — Project Setup, MVC Structure, DB Schema | [ ] |
| **Day 2 (Mar 31)** | Epic 3 + 4 — OOP Classes, PDO Connection, Auth System (US1) | [ ] |
| **Day 3 (Apr 01)** | Epic 5 + 6 — Manager Dashboard (US2, US3) + Surfer Registration (US4) | [ ] |
| **Day 4 (Apr 02)** | Epic 7 + 8 — Surfer Calendar (US5) + Bonus Features (Router, Stats) | [ ] |
| **Day 5 (Apr 03)** | Epic 9 + 10 — Testing Phase, Bug Fixes, Documentation, Final Push | [ ] |

---

## 🟣 EPIC 1 — Project Setup & MVC Structure

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| [ ] | Create MVC folder structure (`/controllers`, `/models`, `/views`, `/config`, `/public`, `/assets`) | 🔴 High | 20 min |
| [ ] | Create `/views` subfolders (`/manager`, `/surfer`, `/auth`, `/partials`) | 🔴 High | 10 min |
| [ ] | Set up single entry point `public/index.php` | 🔴 High | 15 min |
| [ ] | Start XAMPP — enable Apache + MySQL services; verify via `localhost` | 🔴 High | 5 min |
| [ ] | Open phpMyAdmin and create database `taghazout_surf_expo` with UTF-8 charset | 🔴 High | 10 min |
| [ ] | Initialize local Git repo with `.gitignore` (ignore `/vendor`, `.env`, etc.) | 🔴 High | 10 min |
| [ ] | Create GitHub remote repository and link to local | 🔴 High | 10 min |
| [ ] | Create basic `README.md` with project title, description, tech stack placeholder | 🟡 Medium | 15 min |
| [ ] | **Commit:** `"init: MVC project structure and environment setup"` | 🔴 High | 5 min |

---

## 🟣 EPIC 2 — Database Design & Schema

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| [ ] | Design ERD diagram showing `users`, `students`, `lessons` + relationships (draw on paper or tool) | 🔴 High | 30 min |
| [ ] | Write SQL to create `users` table (id, email, password, role [manager/surfer], created_at) | 🔴 High | 15 min |
| [ ] | Write SQL to create `students` table (id, user_id FK, name, country, level [Beginner/Intermediate/Advanced], payment_status, created_at) | 🔴 High | 20 min |
| [ ] | Write SQL to create `lessons` table (id, title, coach_name, session_date, session_time, created_at) | 🔴 High | 15 min |
| [ ] | Write SQL to create `lesson_registrations` linking table (id, student_id FK, lesson_id FK, registered_at) | 🔴 High | 15 min |
| [ ] | Add all Foreign Key constraints with ON DELETE CASCADE where appropriate | 🔴 High | 10 min |
| [ ] | Write seed data: 2 users (1 manager, 1 surfer), 5 students, 3 lessons, 6 registrations | 🟡 Medium | 25 min |
| [ ] | Export full SQL script as `database/taghazout_surf_expo.sql` | 🔴 High | 10 min |
| [ ] | **Commit:** `"feat(db): complete schema with users, students, lessons tables and seeds"` | 🔴 High | 5 min |

---

## 🟣 EPIC 3 — OOP Foundation & Models

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| [ ] | Create `config/Database.php` class with private PDO connection and public `getConnection()` method | 🔴 High | 25 min |
| [ ] | Implement try/catch error handling in Database class with meaningful messages | 🔴 High | 10 min |
| [ ] | Create `models/User.php` class with private properties (id, email, password, role) | 🔴 High | 20 min |
| [ ] | Add public getters/setters in User class with proper encapsulation | 🔴 High | 15 min |
| [ ] | Create `models/Student.php` class with private properties (id, userId, name, country, level, paymentStatus) | 🔴 High | 20 min |
| [ ] | Add public getters/setters and CRUD methods (create, read, update, delete) in Student class | 🔴 High | 30 min |
| [ ] | Create `models/Lesson.php` class with private properties (id, title, coach, date, time) | 🔴 High | 20 min |
| [ ] | Add public getters/setters and CRUD methods in Lesson class | 🔴 High | 25 min |
| [ ] | Create `models/Registration.php` class for lesson-student linking with methods | 🟡 Medium | 20 min |
| [ ] | Test PDO connection with simple query in isolated test file | 🔴 High | 10 min |
| [ ] | **Commit:** `"feat(models): OOP classes with encapsulation - User, Student, Lesson, Registration"` | 🔴 High | 5 min |

---

## 🟣 EPIC 4 — Authentication System (US1)

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| [ ] | Create `controllers/AuthController.php` with login/logout methods | 🔴 High | 25 min |
| [ ] | Create `views/auth/login.php` with email/password form (clean HTML, no SQL!) | 🔴 High | 20 min |
| [ ] | Implement password verification using `password_verify()` against hashed DB password | 🔴 High | 20 min |
| [ ] | Implement PHP Sessions: start session, store user data (id, role) on successful login | 🔴 High | 15 min |
| [ ] | Create role-based redirection (Manager → dashboard, Surfer → calendar) | 🔴 High | 15 min |
| [ ] | Create `middleware/AuthMiddleware.php` to protect routes based on role | 🟡 Medium | 20 min |
| [ ] | Create `views/partials/header.php` with navigation (conditional based on role) | 🟡 Medium | 15 min |
| [ ] | Create `views/partials/footer.php` with copyright info | 🟢 Low | 10 min |
| [ ] | Implement logout functionality (destroy session, redirect to login) | 🟡 Medium | 10 min |
| [ ] | Add form validation: required fields, email format, XSS prevention (`htmlspecialchars`) | 🔴 High | 15 min |
| [ ] | **Commit:** `"feat(auth): secure login system with sessions and role-based access"` | 🔴 High | 5 min |

---

## 🟣 EPIC 5 — Manager Dashboard & Session Management (US2, US3)

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| [ ] | Create `controllers/ManagerController.php` with dashboard, createLesson, updateStudent methods | 🔴 High | 30 min |
| [ ] | Create `views/manager/dashboard.php` displaying all students in a table (no SQL in view!) | 🔴 High | 25 min |
| [ ] | Display all planned lessons/courses on dashboard with student count per session | 🔴 High | 20 min |
| [ ] | Create `views/manager/create-lesson.php` form (Title, Coach, Date, Time) | 🔴 High | 20 min |
| [ ] | Implement lesson creation in controller using Lesson model | 🔴 High | 20 min |
| [ ] | Create `views/manager/assign-students.php` to register students to a lesson by level filter | 🔴 High | 30 min |
| [ ] | Implement level filter dropdown (Beginner/Intermediate/Advanced) on assignment page | 🟡 Medium | 15 min |
| [ ] | Create `views/manager/edit-student.php` form to modify student level | 🔴 High | 20 min |
| [ ] | Implement student level update in controller (US3) | 🔴 High | 15 min |
| [ ] | Add payment status toggle (Paid/Pending) for each student on dashboard | 🟡 Medium | 15 min |
| [ ] | Add visual indicators: color badges for levels (Green/Yellow/Red) | 🟢 Low | 15 min |
| [ ] | **Commit:** `"feat(manager): dashboard with full student/lesson management - US2, US3"` | 🔴 High | 5 min |

---

## 🟣 EPIC 6 — Surfer Registration & Profile (US4)

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| [ ] | Create `controllers/SurferController.php` with register, viewProfile methods | 🔴 High | 20 min |
| [ ] | Create `views/auth/register.php` form (Name, Email, Password, Country, Self-Assessed Level) | 🔴 High | 25 min |
| [ ] | Implement form validation: required fields, unique email check, password strength | 🔴 High | 20 min |
| [ ] | Implement password hashing using `password_hash()` with `PASSWORD_BCRYPT` | 🔴 High | 10 min |
| [ ] | Create new User record with role='surfer' via User model | 🔴 High | 15 min |
| [ ] | Create linked Student record with profile data via Student model | 🔴 High | 15 min |
| [ ] | Display success message and redirect to login after registration | 🟡 Medium | 10 min |
| [ ] | Create `views/surfer/profile.php` to display surfer's own information | 🟡 Medium | 15 min |
| [ ] | Implement profile edit functionality (Name, Country only — level managed by Manager) | 🟢 Low | 20 min |
| [ ] | **Commit:** `"feat(surfer): self-registration system with profile creation - US4"` | 🔴 High | 5 min |

---

## 🟣 EPIC 7 — Surfer Calendar & Payment Status (US5)

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| [ ] | Add method in SurferController to fetch only current user's lessons | 🔴 High | 20 min |
| [ ] | Create `views/surfer/calendar.php` displaying list of upcoming registered lessons | 🔴 High | 25 min |
| [ ] | Display lesson details: Title, Coach, Date, Time in card/list format | 🔴 High | 15 min |
| [ ] | Implement payment status indicator: "Paid" (green badge) or "Pending" (red badge) | 🔴 High | 15 min |
| [ ] | Filter lessons to show only future dates (`WHERE session_date >= CURDATE()`) | 🟡 Medium | 15 min |
| [ ] | Add "No upcoming lessons" message if calendar is empty | 🟢 Low | 10 min |
| [ ] | Ensure surfers can ONLY see their own data (session-based filtering) | 🔴 High | 15 min |
| [ ] | **Commit:** `"feat(surfer): personal calendar with payment status display - US5"` | 🔴 High | 5 min |

---

## 🟣 EPIC 8 — Bonus Features

| Done | Task Description | Priority | Est. |
| :---: | :--- | :--- | :--- |
| [ ] | **BONUS: MVC Router** — Create `core/Router.php` class to handle URL routing | 🟡 Medium | 40 min |
| [ ] | Define routes array mapping URLs to Controller/Action pairs | 🟡 Medium | 20 min |
| [ ] | Implement `public/index.php` as single entry point parsing `REQUEST_URI` | 🟡 Medium | 25 min |
| [ ] | Add `.htaccess` for clean URLs (RewriteEngine) | 🟡 Medium | 15 min |
| [ ] | **BONUS: Stats Dashboard** — Calculate average students per session | 🟡 Medium | 25 min |
| [ ] | Display stat card on manager dashboard: "Average of X students per session" | 🟡 Medium | 15 min |
| [ ] | Add total counts: Total Students, Total Lessons, Pending Payments | 🟢 Low | 20 min |
| [ ] | Add visual chart (simple CSS bar or basic JS chart) for occupancy | 🟢 Low | 30 min |
| [ ] | **Commit:** `"feat(bonus): MVC router and dashboard statistics"` | 🟡 Medium | 5 min |

---

## 🟣 EPIC 9 — Testing Phase

### 🔵 User Story Validation Tests

| Done | Test Case | User Story | Expected Result | Actual Result | Status |
| :---: | :--- | :---: | :--- | :--- | :---: |
| [ ] | Manager logs in with valid credentials | US1 | Redirect to dashboard with all students/lessons visible | | ⏳ |
| [ ] | Manager logs in with invalid credentials | US1 | Error message displayed, no access granted | | ⏳ |
| [ ] | Manager views dashboard with all students listed | US1 | Complete student list with name, level, payment status | | ⏳ |
| [ ] | Manager views all planned courses on dashboard | US1 | All lessons with title, coach, date, time displayed | | ⏳ |
| [ ] | Manager creates new surf session with all fields | US2 | Lesson saved to DB, appears on dashboard | | ⏳ |
| [ ] | Manager assigns students to lesson by level filter | US2 | Selected students linked to lesson in registration table | | ⏳ |
| [ ] | Manager modifies student level (Beginner → Intermediate) | US3 | Level updated in DB, reflected on dashboard | | ⏳ |
| [ ] | Manager modifies student level (Intermediate → Advanced) | US3 | Level updated correctly | | ⏳ |
| [ ] | New surfer registers with complete profile | US4 | User + Student records created, redirect to login | | ⏳ |
| [ ] | Surfer registers with existing email | US4 | Error: "Email already exists" | | ⏳ |
| [ ] | Surfer logs in and views personal calendar | US5 | Only their registered lessons displayed | | ⏳ |
| [ ] | Surfer sees correct payment status (Paid/Pending) | US5 | Accurate badge displayed per their record | | ⏳ |

---

### 🔵 Security & Validation Tests

| Done | Test Case | Category | Expected Result | Actual Result | Status |
| :---: | :--- | :--- | :--- | :--- | :---: |
| [ ] | SQL Injection attempt in login form | Security | Query fails safely, no data exposed | | ⏳ |
| [ ] | SQL Injection attempt in registration form | Security | Prepared statement prevents injection | | ⏳ |
| [ ] | XSS attack via student name field | Security | Script tags escaped/neutralized | | ⏳ |
| [ ] | Direct URL access to manager dashboard without login | Security | Redirect to login page | | ⏳ |
| [ ] | Surfer tries to access manager routes | Security | Access denied, redirect to surfer area | | ⏳ |
| [ ] | Empty required fields on registration | Validation | Error message for each empty field | | ⏳ |
| [ ] | Invalid email format on registration | Validation | "Invalid email format" error | | ⏳ |
| [ ] | Password hashing verification | Security | Stored password is hashed (not plain text) | | ⏳ |

---

### 🔵 Architecture & Code Quality Tests

| Done | Test Case | Category | Expected Result | Actual Result | Status |
| :---: | :--- | :--- | :--- | :--- | :---: |
| [ ] | Verify NO SQL queries in any View files | MVC | Zero PDO/SQL in `/views` folder | | ⏳ |
| [ ] | Verify all Model properties are private | Encapsulation | All properties declared as `private` | | ⏳ |
| [ ] | Verify Models have public getters/setters | Encapsulation | Public methods for data access | | ⏳ |
| [ ] | Verify Controllers don't contain HTML | MVC | Controllers only process logic, return to views | | ⏳ |
| [ ] | Test Database class connection method | OOP | Returns valid PDO instance | | ⏳ |
| [ ] | Verify proper file structure (MVC folders) | Architecture | `/models`, `/views`, `/controllers` properly separated | | ⏳ |

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
| [ ] | Lesson with 0 students registered | Display "No students registered" message | ⏳ |
| [ ] | Student with no lessons assigned | Calendar shows "No upcoming lessons" | ⏳ |
| [ ] | Create lesson with past date | Should be rejected or show warning | ⏳ |
| [ ] | Very long student name (100+ characters) | Truncated or 