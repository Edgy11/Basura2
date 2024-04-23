<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
class Volunteer{
	private $DB_SERVER='172.16.0.214';
	private $DB_USERNAME='group40';
	private $DB_PASSWORD='123456';
	private $DB_DATABASE='group40';
	private $conn;
	 public function __construct() {
        $this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE, $this->DB_USERNAME, $this->DB_PASSWORD);
    }

	public function getAddedVolunteers() {
        $stmt = $this->conn->query("SELECT * FROM tbl_volunteers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public function fetchVolunteerById($id) {
    $sql = "SELECT * FROM tbl_volunteers WHERE ID = :ID";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([':ID' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


public function new_volunteer($name, $email, $event, $role) {
    $sql = "INSERT INTO tbl_volunteers (name, email, event, role) VALUES (:name, :email, :event, :role)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
	$stmt->bindParam(':event', $event);
    $stmt->bindParam(':role', $role);
    return $stmt->execute();
}


	public function update_volunteer($id, $name, $email, $role, $profile_pic) {
		$sql = "UPDATE tbl_volunteers SET name = :name, email = :email, role = :role, profile_pic = :profile_pic WHERE ID = :ID";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':ID', $id);
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':role', $role);
		$stmt->bindParam(':profile_pic', $profile_pic);
		return $stmt->execute();
	}
	

	public function delete_volunteer($id){
		$sql = "DELETE FROM tbl_volunteers WHERE ID = :ID";
		$q = $this->conn->prepare($sql);
		try {
			$q->execute([':ID' => $id]);
			return true;
		} catch (Exception $e) {
			// Log the error or handle it as per your need
			return false;
		}
	}
	
	public function fetchAllVolunteers() {
		$sql = "SELECT * FROM tbl_volunteers";
		$stmt = $this->conn->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	
	
}