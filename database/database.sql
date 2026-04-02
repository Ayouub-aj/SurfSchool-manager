-- DATABASE SCHEMA: Surf School Manager

-- 1. USERS TABLE: This is the "Identity" table for logins.
-- It stores the email and password for both Admins and Students.
CREATE TABLE IF NOT EXISTS `users` (
    `id`            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,       --Unique ID for every user. UNSIGNED allows more than 1000000000 users. not like signed integer
    `email`         VARCHAR(150) NOT NULL UNIQUE,                  --Email: VARCHAR(150) allows long emails. UNIQUE = no two people can use the same email.
    `password`      VARCHAR(255) NOT NULL,                         -- Password: VARCHAR(255) is long enough to hold a secure "hashed" password (BCRYPT).
    `role`          ENUM('admin', 'student') DEFAULT 'student',    -- Role: ENUM restricts the choice to ONLY 'admin' or 'student'. DEFAULT 'student' means every new signup starts as a client.
    `created_at`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB; -- InnoDB is the engine that allows Foreign Keys (Relational) it enforces them


-- 2. STUDENTS TABLE: This is the "Profile" table (US4).
-- It stores the extra details like Name, Country, and Skill Level.
CREATE TABLE IF NOT EXISTS `students` (
    `id`            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,                    -- user_id: This links this profile back to a row in the 'users' table.
    `user_id`       INT UNSIGNED NOT NULL,
    `full_name`     VARCHAR(100) NOT NULL,
    `country`       VARCHAR(50),
    `level`         ENUM('Beginner', 'Intermediate', 'Advanced') NOT NULL,      -- Level: Restricted to these 3 choices. 
                                                                                -- This fulfills (Managing student levels) and not set to default to force the admin to choose a level!!
    `phone`         VARCHAR(20),                                                -- Phone: A string (VARCHAR) to allow symbols like '+' or spaces.
    
    -- FOREIGN KEY: This "glues" students to users.
    -- ON DELETE CASCADE: if the user account is deleted, the student profile disappears too.
    CONSTRAINT fk_student_user FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;


-- 3. LESSONS TABLE: This is the "Schedule" table.`
-- Created by the Gérant (Admin) to manage surf sessions.
CREATE TABLE IF NOT EXISTS `lessons` (
    `id`            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `title`         VARCHAR(100) NOT NULL,              -- Title: e.g., "Sunrise Surf Session" or "Pro Training".
    `coach_name`    VARCHAR(100) NOT NULL,              -- Coach: The name of the instructor leading the class.
    `lesson_date`   DATETIME NOT NULL,                  -- DATETIME: Stores both the Day and the Hour of the class.
    `max_capacity`  INT UNSIGNED DEFAULT 10,            -- Capacity: Limited to positive numbers (UNSIGNED). Defaults to 10 surfers.
    `created_at`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;


-- 4. ENROLLMENTS TABLE: This is the "Join Table" (Many-to-Many).
-- Since one student can take many lessons, and one lesson has many students.
CREATE TABLE IF NOT EXISTS `enrollments` (
    `student_id`        INT UNSIGNED NOT NULL,                      -- student_id: Links to a specific student profile.
    `lesson_id`         INT UNSIGNED NOT NULL,                      -- lesson_id: Links to a specific surf session.
    `payment_status`    ENUM('Pending', 'Paid') DEFAULT 'Pending',  -- Payment Status: (checking if the student has paid).

    -- PRIMARY KEY (Composite): Prevents a student from signing up for the SAME lesson twice.
    PRIMARY KEY (`student_id`, `lesson_id`),
    
    -- Relational Integrity: Links this table to the students and lessons tables.
    CONSTRAINT 
        fk_enroll_student FOREIGN KEY (`student_id`) REFERENCES `students`(`id`) ON DELETE CASCADE,
    CONSTRAINT 
        fk_enroll_lesson FOREIGN KEY (`lesson_id`) REFERENCES `lessons`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB;