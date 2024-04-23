<?php
include 'classes/class.event.php'; // Adjust the path as necessary
$eventClass = new Event();

// Check if the 'id' GET variable is set
if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $event = $eventClass->fetchEventById($eventId); // Implement this method in your Event class
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_event'])) {
    $updateResult = $eventClass->updateEvent($_POST['id'], $_POST['date'], $_POST['time'], $_POST['event'], $_POST['location']);
    if ($updateResult) {
        echo "<script>alert('Event updated successfully!'); window.location.href='Event.php';</script>";
    } else {
        echo "<script>alert('Failed to update event.');</script>";
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Edit Event</title>

</head>
<style>
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
    line-height: 1.6;
    color: #333;
}

form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="date"],
input[type="time"],
input[type="text"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box; /* Make sure padding doesn't affect the overall width */
}

input[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.2s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

p {
    text-align: center;
}

    </style>
<body>
    <?php if (isset($event) && $event): ?>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= htmlspecialchars($event['id']) ?>">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?= htmlspecialchars($event['date']) ?>" required><br>
        <label for="time">Time:</label>
        <input type="time" id="time" name="time" value="<?= htmlspecialchars($event['time']) ?>" required><br>
        <label for="event">Event:</label>
        <input type="text" id="event" name="event" value="<?= htmlspecialchars($event['event']) ?>" required><br>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="<?= htmlspecialchars($event['location']) ?>" required><br>
        <input type="submit" name="update_event" value="Update Event">
    </form>
    <?php else: ?>
    <p>Event not found.</p>
    <?php endif; ?>
</body>
</html>
