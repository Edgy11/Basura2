<?php
include '../classes/class.event.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'delete':
        // Assuming the event ID is passed as a GET parameter
        $eventId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($eventId) {
            $eventClass = new Event();
            $result = $eventClass->deleteEvent($eventId);
            if ($result) {
                echo "<script>alert('Event deleted successfully!'); window.location.href='yourpage.php';</script>";
            } else {
                echo "<script>alert('Failed to delete event.'); window.location.href='yourpage.php';</script>";
            }
        }
        break;

        switch ($action) {
            case 'edit':
                $id = $_GET['id']; // or $_POST['id'] if you're sending the ID via POST
                $date = $_POST['date'];
                $time = $_POST['time'];
                $event = $_POST['event'];
                $location = $_POST['location'];
                
                $result = $eventClass->updateEvent($id, $date, $time, $event, $location);
        
                if ($result) {
                    // Redirect or show a success message
                    header('Location: Event.php?message=Event Updated Successfully');
                } else {
                    // Redirect or show an error message
                    header('Location: Event.php?error=Failed to Update Event');
                }
                break;
        
            // Other cases...
        }
        
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date'])) {
    include 'classes/class.event.php'; // Adjust the path as necessary
    $eventClass = new Event();
    $result = $eventClass->addEvent($_POST['date'], $_POST['time'], $_POST['event'], $_POST['location']);
    if ($result) {
        echo "<script>alert('Event added successfully!');</script>";
    } else {
        echo "<script>alert('Failed to add event.');</script>";
    }

    
}


?>
