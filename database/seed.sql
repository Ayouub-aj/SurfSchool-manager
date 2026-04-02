-- DATA SEEDING: Creating "Fake" data for your 10-minute demo.

-- Inserting 1 Admin and 1 Student (Passwords are 'password123' hashed).
INSERT INTO `users` (`email`, `password`, `role`) VALUES
('admin@surfexpo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
('surfer1@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student');

-- Creating the profile for the student we just added (User ID 2).
INSERT INTO `students` (`user_id`, `full_name`, `country`, `level`) VALUES
(2, 'Yassine Benani', 'Morocco', 'Intermediate');

-- Creating a lesson session for the demo.
INSERT INTO `lessons` (`title`, `coach_name`, `lesson_date`) VALUES
('Sunset Surf Session', 'Coach Mehdi', '2026-04-01 18:00:00');

-- Enrolling the student in the lesson (Student ID 1 into Lesson ID 1).
INSERT INTO `enrollments` (`student_id`, `lesson_id`, `payment_status`) VALUES
(1, 1, 'Paid');
