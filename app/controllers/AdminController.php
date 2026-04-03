<?php
class AdminController extends Controller {
    public function __construct() {
        require_once BASEURL . '/middleware/AuthMiddleware.php';
        AuthMiddleware::adminOnly();
    }

    public function dashboard() {
        try {
            $studentModel = $this->model('Student');
            $lessonModel = $this->model('Lesson');
            $students = $studentModel->getStudentsWithEmails();
            $lessons = $lessonModel->getUpcomingLessons();
            $avgOccupancy = $lessonModel->getAverageStudentsPerSession();
            $this->view('admin/dashboard', [
                'students' => $students,
                'lessons' => $lessons,
                'avgOccupancy' => $avgOccupancy
            ]);
        } catch (Exception $e) {
            die("Admin Error: Accessing dashboard failed. Details: " . $e->getMessage());
        }
    }

    public function manageLessons() {
        try {
            $lessonModel = $this->model('Lesson');
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $lessonModel->create([
                    'title' => $_POST['title'],
                    'coach_name' => $_POST['coach_name'],
                    'lesson_date' => $_POST['lesson_date'],
                    'max_capacity' => $_POST['max_capacity']
                ]);
                header('Location: ' . URLROOT . '/index.php?url=AdminController/dashboard');
                exit();
            }
            $lessons = $lessonModel->readAll();
            $this->view('admin/manage-lessons', ['lessons' => $lessons]);
        } catch (Exception $e) {
            die("Admin Error: Lesson management failed. Details: " . $e->getMessage());
        }
    }

    public function assignStudent() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $lessonId = $_POST['lesson_id'];
                $studentId = $_POST['student_id'];
                $lessonModel = $this->model('Lesson');
                $lessonModel->registerStudent($lessonId, $studentId);
                header('Location: ' . URLROOT . '/index.php?url=AdminController/dashboard');
                exit();
            }
        } catch (Exception $e) {
            die("Admin Error: Student assignment failed. Details: " . $e->getMessage());
        }
    }

    public function updateLevel() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $studentId = $_POST['student_id'];
                $level = $_POST['level'];
                $studentModel = $this->model('Student');
                $studentModel->updateLevel($studentId, $level);
                header('Location: ' . URLROOT . '/index.php?url=AdminController/dashboard');
                exit();
            }
        } catch (Exception $e) {
            die("Admin Error: Level update failed. Details: " . $e->getMessage());
        }
    }

    public function deleteStudent() {
        try {
            if (isset($_GET['id'])) {
                $studentModel = $this->model('Student');
                $studentModel->delete($_GET['id']);
                header('Location: ' . URLROOT . '/index.php?url=AdminController/dashboard');
                exit();
            }
        } catch (Exception $e) {
            die("Admin Error: Student deletion failed. Details: " . $e->getMessage());
        }
    }

    public function togglePayment() {
        try {
            if (isset($_GET['lesson_id']) && isset($_GET['student_id']) && isset($_GET['status'])) {
                $lessonModel = $this->model('Lesson');
                $lessonModel->updatePaymentStatus($_GET['lesson_id'], $_GET['student_id'], $_GET['status']);
                header('Location: ' . URLROOT . '/index.php?url=AdminController/dashboard');
                exit();
            }
        } catch (Exception $e) {
            die("Admin Error: Payment toggle failed. Details: " . $e->getMessage());
        }
    }
}
