#!/bin/bash

# --- 1. DIRECTORY STRUCTURE (Project Skeleton) ---
# mkdir -p creates the folders and ensures parent folders exist.
# We separate views by 'role' (admin/student) for better organization.

mkdir -p app/controllers app/core app/models app/views/admin app/views/student app/views/auth app/views/shared config database public/img public/style tests

# --- 2. THE KITCHEN (Application Logic) ---
# This is where the "cooking" happens. It is private and hidden from users.

# CONTROLLERS: The "Waiters" 
# They take user requests, talk to the Model, and bring back the View.
touch app/controllers/AuthController.php    # Handles Login/Logout.
touch app/controllers/AdminController.php   # Handles the Dashboard & Planning.
touch app/controllers/StudentController.php # Handles Profiles & Agendas.
touch app/controllers/LessonController.php  # Handles Creating Sessions.

# CORE: The "Equipment"
# The base tools that make the whole MVC system work.
touch app/core/App.php        # The Router: The "Host" who directs traffic.
touch app/core/Controller.php # Base Controller: The tool used to load HTML views.
touch app/core/Model.php      # Base Model: The tool used to connect to the Database.

# MODELS: The "Ingredients & Recipes"
# These files handle the raw data and SQL. They use private properties (Encapsulation).
touch app/models/User.php    # Data logic for accounts.
touch app/models/Student.php # Data logic for student levels.
touch app/models/Lesson.php  # Data logic for surf sessions.

# VIEWS: The "Plating & Presentation"
# These are just HTML/CSS files. They "show" the food but don't cook it (Zero SQL).
touch app/views/admin/dashboard.php      # The Admin's main screen.
touch app/views/admin/manage-lessons.php # The screen to create sessions.
touch app/views/student/register.php     # The sign-up form.
touch app/views/student/my-agenda.php    # The student's personal schedule.
touch app/views/auth/login.php           # The login page.
touch app/views/shared/footer.php        # Reusable bottom part of the site.
touch app/views/shared/header.php        # Reusable top part of the site.

# --- 3. THE STAFF MANUAL & STORAGE (Data & Config) ---
touch config/db.php           # Secret codes to connect to the Database.
touch database/database.sql   # The blueprint (tables) for the database.
touch database/seed.sql       # "Fake" insertion of test data for live demo.

# --- 4. THE DINING ROOM (The Public Face) ---
# The ONLY folder the browser can actually see. Everything else is protected.
touch public/img/logo.png     # Images for the site.
touch public/style/main.css   # The design and colors.
touch public/index.php        # The "Front Door": Every single request starts here.

# --- 5. DOCUMENTATION & TESTING ---
touch LICENSE README.md       # Project info for GitHub.
touch tests/unit_tests.php    # The "Health Check" to make sure code works.

echo "--------------------------------------------------------"
echo "✅ MVC Structure for Taghazout Surf Expo created!"
echo "💡 Remember: Controllers = Waiters, Models = Ingredients, Views = Plating."
echo "--------------------------------------------------------"