<?php

class Event {
    private $dbHost = '172.16.0.214';
    private $dbUsername = 'group40';
    private $dbPassword = '123456';
    private $dbName = 'group20';
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function addEvent($date, $time, $eventName, $location) {
        $stmt = $this->conn->prepare("INSERT INTO tbl_events (date, time, event, location) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $date, $time, $eventName, $location);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    public function fetchEvents() {
        $sql = "SELECT * FROM tbl_events ORDER BY date ASC, time ASC"; // Adjust SQL as needed
        $result = $this->conn->query($sql);
        $events = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $events[] = $row;
            }
        }
        return $events;
    }
    public function deleteEvent($eventId) {
        $stmt = $this->conn->prepare("DELETE FROM tbl_events WHERE id = ?");
        $stmt->bind_param("i", $eventId);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method to fetch a single event by ID
public function fetchEventById($eventId) {
    $stmt = $this->conn->prepare("SELECT * FROM tbl_events WHERE id = ?");
    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Method to update an event
public function updateEvent($id, $date, $time, $eventName, $location) {
    $stmt = $this->conn->prepare("UPDATE tbl_events SET date = ?, time = ?, event = ?, location = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $date, $time, $eventName, $location, $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

    
    }

    
?>
