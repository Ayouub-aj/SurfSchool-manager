<?php
class User extends Model {
    private $id;
    private $email;
    private $password;
    private $role;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

    public function getPassword() { return $this->password; }
    public function setPassword($password) { $this->password = $password; }

    public function getRole() { return $this->role; }
    public function setRole($role) { $this->role = $role; }

    public function create($data) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
            $stmt->execute([$data['email'], $data['password'], $data['role']]);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            die("Database Error: User creation failed in User model. Details: " . $e->getMessage());
        }
    }

    public function findByEmail($email) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            die("Database Error: User lookup by email failed. Details: " . $e->getMessage());
        }
    }

    public function readAll() {
        try {
            $stmt = $this->db->query("SELECT * FROM users");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Database Error: Failed to fetch all users. Details: " . $e->getMessage());
        }
    }
}
