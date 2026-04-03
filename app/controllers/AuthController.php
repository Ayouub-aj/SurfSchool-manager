<?php
require_once BASEURL . '/middleware/AuthMiddleware.php';

class AuthController extends Controller {
    public function login() {
        AuthMiddleware::guestOnly();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $userModel = $this->model('User');
                $user = $userModel->findByEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_role'] = $user['role'];
                    $_SESSION['user_email'] = $user['email'];

                    if ($user['role'] === 'admin') {
                        header('Location: ' . URLROOT . '/index.php?url=AdminController/dashboard');
                    } else {
                        header('Location: ' . URLROOT . '/index.php?url=StudentController/myAgenda');
                    }
                    exit();
                } else {
                    $error = "Invalid email or password.";
                    $this->view('auth/login', ['error' => $error]);
                }
            } catch (Exception $e) {
                die("Auth Error: Login attempt failed. Details: " . $e->getMessage());
            }
        } else {
            $this->view('auth/login');
        }
    }

    public function register() {
        AuthMiddleware::guestOnly();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $fullName = $_POST['full_name'];
                $country = $_POST['country'];
                $level = $_POST['level'];
                $phone = $_POST['phone'];

                $userModel = $this->model('User');
                if ($userModel->findByEmail($email)) {
                    $error = "This email is already registered.";
                    return $this->view('auth/registration', ['error' => $error]);
                }

                $userId = $userModel->create([
                    'email' => $email,
                    'password' => $password,
                    'role' => 'student'
                ]);

                if ($userId) {
                    $studentModel = $this->model('Student');
                    $studentModel->create([
                        'user_id' => $userId,
                        'full_name' => $fullName,
                        'country' => $country,
                        'level' => $level,
                        'phone' => $phone
                    ]);
                    header('Location: ' . URLROOT . '/index.php?url=AuthController/login');
                    exit();
                }
            } catch (Exception $e) {
                die("Auth Error: Registration failed. Details: " . $e->getMessage());
            }
        } else {
            $this->view('auth/registration');
        }
    }

    public function logout() {
        try {
            session_unset();
            session_destroy();
            header('Location: ' . URLROOT . '/index.php?url=AuthController/login');
            exit();
        } catch (Exception $e) {
            die("Auth Error: Logout failed. Details: " . $e->getMessage());
        }
    }
}
