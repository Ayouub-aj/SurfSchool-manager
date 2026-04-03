<?php
class Student extends Model {
    private $id;
    private $user_id;
    private $full_name;
    private $country;
    private $level;
    private $phone;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getUserId() { return $this->user_id; }
    public function setUserId($user_id) { $this->user_id = $user_id; }

    public function getFullName() { return $this->full_name; }
    public function setFullName($full_name) { $this->full_name = $full_name; }

    public function getCountry() { return $this->country; }
    public function setCountry($country) { $this->country = $country; }

    public function getLevel() { return $this->level; }
    public function setLevel($level) { $this->level = $level; }

    public function getPhone() { return $this->phone; }
    public function setPhone($phone) { $this->phone = $phone; }

    public function create($data) {
        try {
            $stmt = $this->db->prepare("INSERT INTO students (user_id, full_name, country, level, phone) VALUES (?, ?, ?, ?, ?)");
            return $stmt->execute([$data['user_id'], $data['full_name'], $data['country'], $data['level'], $data['phone']]);
        } catch (PDOException $e) {
            die("Database Error: Student creation failed in Student model. Details: " . $e->getMessage());
        }
    }

    public function getStudentsWithEmails() {
        try {
            $stmt = $this->db->query("SELECT s.*, u.email FROM students s JOIN users u ON s.user_id = u.id ORDER BY s.id ASC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Database Error: Failed to fetch students with email. Details: " . $e->getMessage());
        }
    }

    public function findByUserId($userId) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM students WHERE user_id = ?");
            $stmt->execute([$userId]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            die("Database Error: Student search by user ID failed. Details: " . $e->getMessage());
        }
    }

    public function readById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM students WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            die("Database Error: Student lookup by ID failed. Details: " . $e->getMessage());
        }
    }

    public function update($id, $data) {
        try {
            $stmt = $this->db->prepare("UPDATE students SET full_name = ?, country = ?, level = ?, phone = ? WHERE id = ?");
            return $stmt->execute([$data['full_name'], $data['country'], $data['level'], $data['phone'], $id]);
        } catch (PDOException $e) {
            die("Database Error: Student update failed for ID $id. Details: " . $e->getMessage());
        }
    }

    public function updateLevel($id, $level) {
        try {
            $stmt = $this->db->prepare("UPDATE students SET level = ? WHERE id = ?");
            return $stmt->execute([$level, $id]);
        } catch (PDOException $e) {
            die("Database Error: Student level update failed. Details: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $stmt = $this->db->prepare("SELECT user_id FROM students WHERE id = ?");
            $stmt->execute([$id]);
            $student = $stmt->fetch();
            if ($student) {
                $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
                return $stmt->execute([$student['user_id']]);
            }
            return false;
        } catch (PDOException $e) {
            die("Database Error: Failed to remove student and user account. Details: " . $e->getMessage());
        }
    }
}
