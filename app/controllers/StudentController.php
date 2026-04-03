<?php
class StudentController extends Controller {
    public function __construct() {
        require_once BASEURL . '/middleware/AuthMiddleware.php';
        AuthMiddleware::authOnly();
    }

    public function myAgenda() {
        try {
            $studentModel = $this->model('Student');
            $lessonModel = $this->model('Lesson');
            $student = $studentModel->findByUserId($_SESSION['user_id']);
            if (!$student) {
                die("Student Error: profile not found. Please contact manager.");
            }
            $lessons = $lessonModel->getStudentLessons($student['id']);
            $this->view('student/my-agenda', [
                'student' => $student,
                'lessons' => $lessons
            ]);
        } catch (Exception $e) {
            die("Student Error: Accessing agenda failed. Details: " . $e->getMessage());
        }
    }

    public function profile() {
        try {
            $studentModel = $this->model('Student');
            $student = $studentModel->findByUserId($_SESSION['user_id']);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $studentModel->update($student['id'], [
                    'full_name' => $_POST['full_name'],
                    'country' => $_POST['country'],
                    'level' => $student['level'],
                    'phone' => $_POST['phone']
                ]);
                header('Location: ' . URLROOT . '/index.php?url=StudentController/myAgenda');
                exit();
            }
            $this->view('student/profile', ['student' => $student]);
        } catch (Exception $e) {
            die("Student Error: Profile update failed. Details: " . $e->getMessage());
        }
    }
}
