<?php
class Lesson extends Model {
    private $id;
    private $title;
    private $coach_name;
    private $lesson_date;
    private $max_capacity;

    public function create($data) {
        try {
            $stmt = $this->db->prepare("INSERT INTO lessons (title, coach_name, lesson_date, max_capacity) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$data['title'], $data['coach_name'], $data['lesson_date'], $data['max_capacity']]);
        } catch (PDOException $e) {
            die("Database Error: Lesson creation failed in Lesson model. Details: " . $e->getMessage());
        }
    }

    public function readAll() {
        try {
            $stmt = $this->db->query("SELECT * FROM lessons ORDER BY lesson_date DESC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Database Error: Failed to fetch lessons. Details: " . $e->getMessage());
        }
    }

    public function getUpcomingLessons() {
        try {
            $stmt = $this->db->query("SELECT l.*, (SELECT COUNT(*) FROM lesson_registrations WHERE lesson_id = l.id) as student_count FROM lessons l ORDER BY l.lesson_date ASC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Database Error: Failed to fetch upcoming lessons. Details: " . $e->getMessage());
        }
    }

    public function readById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM lessons WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            die("Database Error: Lesson lookup by ID failed. Details: " . $e->getMessage());
        }
    }

    public function update($id, $data) {
        try {
            $stmt = $this->db->prepare("UPDATE lessons SET title = ?, coach_name = ?, lesson_date = ?, max_capacity = ? WHERE id = ?");
            return $stmt->execute([$data['title'], $data['coach_name'], $data['lesson_date'], $data['max_capacity'], $id]);
        } catch (PDOException $e) {
            die("Database Error: Lesson update failed. Details: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM lessons WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            die("Database Error: Lesson deletion failed. Details: " . $e->getMessage());
        }
    }

    public function registerStudent($lessonId, $studentId) {
        try {
            $stmt = $this->db->prepare("INSERT INTO lesson_registrations (lesson_id, student_id) VALUES (?, ?)");
            return $stmt->execute([$lessonId, $studentId]);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                die("Registration Error: Student is already registered for this session.");
            }
            die("Database Error: Failed to register student for lesson. Details: " . $e->getMessage());
        }
    }

    public function getStudentLessons($studentId) {
        try {
            $stmt = $this->db->prepare("SELECT l.*, lr.payment_status FROM lessons l JOIN lesson_registrations lr ON l.id = lr.lesson_id WHERE lr.student_id = ? ORDER BY l.lesson_date ASC");
            $stmt->execute([$studentId]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Database Error: Failed to fetch student agenda. Details: " . $e->getMessage());
        }
    }

    public function updatePaymentStatus($lessonId, $studentId, $status) {
        try {
            $stmt = $this->db->prepare("UPDATE lesson_registrations SET payment_status = ? WHERE lesson_id = ? AND student_id = ?");
            return $stmt->execute([$status, $lessonId, $studentId]);
        } catch (PDOException $e) {
            die("Database Error: Payment status update failed. Details: " . $e->getMessage());
        }
    }

    public function getAverageStudentsPerSession() {
        try {
            $stmt = $this->db->query("SELECT AVG(student_count) as avg_occupancy FROM (SELECT COUNT(*) as student_count FROM lesson_registrations GROUP BY lesson_id) as counts");
            $res = $stmt->fetch();
            return $res ? round($res['avg_occupancy'], 1) : 0;
        } catch (PDOException $e) {
            die("Database Error: Average occupancy calculation failed. Details: " . $e->getMessage());
        }
    }
}
