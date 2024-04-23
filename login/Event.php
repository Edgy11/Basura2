<?php
include 'classes/class.event.php'; // Adjust the path as necessary
$eventClass = new Event();
$events = $eventClass->fetchEvents();


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['event'])) {
    $result = $eventClass->addEvent($_POST['date'], $_POST['time'], $_POST['event'], $_POST['location']);
    if ($result) {
        echo "<script>alert('Event added successfully!'); window.location.href='Event.php';</script>";
    } else {
        echo "<script>alert('Failed to add event.');</script>";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $deleteResult = $eventClass->deleteEvent($eventId);
    if ($deleteResult) {
        echo "<script>alert('Event deleted successfully.'); window.location = 'Event.php';</script>";
    } else {
        echo "<script>alert('Failed to delete event.');</script>";
    }
}

$events = $eventClass->fetchEvents();


?>


<!DOCTYPE HTML>
<html lang="en">
<html>
<head>
    <title>BASURA.COM</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="css/Volunteer.css?<?php echo time();?>">
    <link rel="stylesheet" href="css/event.css?<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <style>
        /* CSS for modal */
        .modal-container {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px; /* Location of the modal container */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 5% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* Base button styles */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 20px;
    border: none;
    border-radius: 50px; /* More rounded corners */
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s ease;
    font-size: 16px;
    text-decoration: none;
    color: white;
    margin: 0 5px;
    background-image: linear-gradient(145deg, #007bff, #0056b3); /* Gradient background for all buttons */
    box-shadow: 0 4px 6px rgba(0,0,0,0.1); /* Subtle shadow */
}

/* Hover and focus styles for all buttons */
.btn:hover, .btn:focus {
    transform: translateY(-2px);
    box-shadow: 0 6px 8px rgba(0,0,0,0.15);
}

/* Edit button specific styles */
.btn-edit {
    background-image: linear-gradient(145deg, #4CAF50, #388E3C); /* Green gradient */
}

.btn-edit:hover, .btn-edit:focus {
    background-image: linear-gradient(145deg, #388E3C, #2E7D32);
}

/* Delete button specific styles */
.btn-delete {
    background-image: linear-gradient(145deg, #f44336, #d32f2f); /* Red gradient */
}

.btn-delete:hover, .btn-delete:focus {
    background-image: linear-gradient(145deg, #d32f2f, #c62828);
}

/* Card Slider Styles */
.card-slider {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    padding: 20px;
    gap: 20px;
}

.event-card-container {
    flex: 0 0 auto;
    width: 300px; /* Set a fixed width for each card */
    margin: 0 10px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2); /* Shadow for depth */
    border-radius: 10px; /* Rounded corners for a softer look */
    overflow: hidden; /* Ensure the content conforms to the border radius */
    transform: scale(0.9);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.event-card-container:hover {
    transform: scale(1);
    box-shadow: 0 12px 24px rgba(0,0,0,0.25);
}

.event-header {
    background: linear-gradient(145deg, #007bff, #0056b3);
    color: white;
    padding: 15px 20px;
    font-size: 18px;
    font-weight: bold;
}

.event-body {
    padding: 15px 20px;
    background-color: #fff; /* Light background for the content area */
}

.event-footer {
    padding: 10px 20px;
    background: #f8f9fa;
    text-align: right;
    border-top: 1px solid #e9ecef; /* Subtle separator */
}

.btn {
    text-decoration: none;
    color: white;
    font-weight: bold;
}

/* Button Styles from previous enhancements */
/* Add your existing .btn, .btn-edit, .btn-delete styles here */

/* Ensure your buttons and other elements adapt to the card design */

    </style>
</head>
<body class="is-preload">
    <div class="card-slider">
        
        <div id="sidebar">
            <div class="inner">
                <section id="search" class="alt">
                    <form method="post" action="#">
                        <input type="text" name="query" id="query" placeholder="Search" />
                    </form>
                </section>
                <nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <ul>
                        <li><a href="index.php">Homepage</a></li>
                        <li><a href="Event.php">Event</a></li>
                        <li><a href="Schedule.php">Schedule</a></li>
                        <li><a href="edit_volunteer.php">Volunteer</a></li>
                        <li></li>
                    </ul>
                </nav>
                <section>
                    <div class="main"></div>
                </section>
                <section>
                    <header class="major">
                        <h2>Background</h2>
                    </header>
                    <p>Project Basura was founded in 2024 with a clear mission: to provide efficient and eco-friendly waste management solutions to communities and businesses. Recognizing the growing need for responsible waste disposal, our company started with just a handful of employees and a few trucks.

                        The past few months, Project Basura has grown into a trusted name in the industry, serving both residential and commercial clients across the region. We offer a range of services, including curbside collection, recycling programs, dumpster rentals, and hazardous waste disposal.</p>
                    <ul class="contact">
                        <li class="icon solid fa-envelope"><a href="#">Basura@gmail.com</a></li>
                        <li class="icon solid fa-phone">0912341212</li>
                        <li class="icon solid fa-home">Kabankalan City<br />
                            Negros Occidental</li>
                    </ul>
                </section>
                <footer id="footer">
                    <p class="copyright">&copy; Untitled. All rights reserved. <a href="https://unsplash.com"></a>.  
                        <a href=""></a>.</p>
                </footer>
            </div>
        </div>

        <div class="cards">
    <?php foreach ($events as $event): ?>
        <div class="event-card-container">
            <div class="event-card">
                <div class="event-header">
                    <!-- Optional: Add an event image or title here -->
                </div>
                <div class="event-body">
                    <p>Date: <span class="event-date"><?= htmlspecialchars($event['date']) ?></span></p>
                    <p>Time: <span class="event-time"><?= htmlspecialchars($event['time']) ?></span></p>
                    <p>Event: <span class="event-name"><?= htmlspecialchars($event['event']) ?></span></p>
                    <p>Location: <span class="event-location"><?= htmlspecialchars($event['location']) ?></span></p>
                </div>
                <div class="event-footer">
    
                
                <a href="edit_event.php?id=<?= $event['id'] ?>" class="btn btn-edit"><i class="fas fa-edit"></i> Edit</a>

    <!-- Update the href with the correct path to your PHP file -->
    <a href="?action=delete&id=<?= $event['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure?');"><i class="fas fa-trash-alt"></i> Delete</a>
</div>

            </div>
        </div>
    <?php endforeach; ?>
    <button class="btn add-event-btn" id="add-event">Add Event</button>
</div>

    <div id="addEventModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add Event</h2>
            <form id="addEventForm" method="POST" action="">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required><br>
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required><br>
                <label for="event">Event:</label>
                <input type="text" id="event" name="event" required><br>
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required><br>
                <input type="submit" value="Add Event">
            </form>
        </div>
    </div>

<script>
   document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("addEventModal");
    // Correct the ID from "addEventBtn" to "add-event"
    var btn = document.getElementById("add-event"); 
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

document.getElementById('add-volunteer-btn').addEventListener('click', function() {
    // Code to show the form or modal
    document.getElementById('addVolunteerModal').style.display = 'block';
});

document.querySelectorAll('.delete-event').forEach(button => {
    button.addEventListener('click', function() {
        const eventId = this.getAttribute('data-event-id');
        if(confirm('Are you sure you want to delete this event?')) {
            fetch('?action=delete&eventId=' + eventId) // Adjust the URL as needed
                .then(response => response.text())
                .then(text => {
                    alert('Event deleted successfully!');
                    window.location.reload(); // Reload the page to update the list
                })
                .catch(err => alert('Failed to delete event.'));
        }
    });
});



</script>
</body>
</html>