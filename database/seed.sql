-- DATA SEEDING/addition:

-- Inserting 1 Admin and 1 Student (Passwords are 'password' hashed).
INSERT INTO `users` (`email`, `password`, `role`) VALUES
('admin@surfexpo.com', '$2y$10$89W1fO4598VjUe28.89OJuF1.Z5U2rWv6.V3P2V3P2V3P2V3P2V3', 'admin'),
('surfer1@surfexpo.com', '$2y$10$89W1fO4598VjUe28.89OJuF1.Z5U2rWv6.V3P2V3P2V3P2V3P2V3', 'student');

-- Creating the profile for the student (User ID 2).
INSERT INTO `students` (`user_id`, `full_name`, `country`, `level`) VALUES
(2, 'ayouub', 'Morocco', 'Intermediate');

-- Creating some lesson sessions for the demo.
INSERT INTO `lessons` (`title`, `coach_name`, `lesson_date`) VALUES
    ('Sunrise Surf Session', 'Coach Hamza', '2026-04-10 07:00:00'),
    ('Intermediate Training', 'Coach Sarah', '2026-04-10 10:30:00'),
    ('Sunset Surf Session', 'Coach Mehdi', '2026-04-11 18:00:00'),
    ('Pro Skills Class', 'Coach Yassine', '2026-04-12 15:00:00'),
    ('Weekend Beach Surf', 'Coach Hamza', '2026-04-13 09:00:00');

-- Enrolling the student in some lessons (Table: lesson_registrations).
INSERT INTO `lesson_registrations` (`student_id`, `lesson_id`, `payment_status`) VALUES
    (1, 1, 'Paid'),
    (1, 3, 'Pending');
