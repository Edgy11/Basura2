<!DOCTYPE HTML>
<html lang="en">

<html>
	<head>
		<title>BASURA.COM</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="css/Volunteer.css?<?php echo time();?>">
	</head>
	<body class="is-preload">
	<div class="overlay"></div> <!-- Place this right inside the body tag -->

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
						<p class="copyright">&copy; Untitled. All rights reserved. <a href="https://unsplash.com"></a>.  <a href=""></a>.</p>
					</footer>
				</div>
			</div>
            <?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'classes/class.volunteer.php';

// Create a new Volunteer object
$volunteer = new Volunteer();

// Fetch all volunteer data from the database
$volunteerData = $volunteer->fetchAllVolunteers();

// Debugging: Output the fetched data to check its structure

// Iterate over the volunteer data to generate HTML for each card
$cardsHTML = '';
foreach ($volunteerData as $volunteer) {
    $cardsHTML .= '<div class="card">';
    $cardsHTML .= '<img src="profilepics/' . $volunteer['profile_pic'] . '" alt="Profile Picture">';
    $cardsHTML .= '<p>ID: ' . ($volunteer['ID']) . '</p>';
    $cardsHTML .= '<p>Name: ' . ($volunteer['Name']) . '</p>'; // Using null coalescing operator
    $cardsHTML .= '<p>Email: ' . ($volunteer['Email']). '</p>'; // Using null coalescing operator
    $cardsHTML .= '<p>Role: ' . ($volunteer['Role']) . '</p>'; // Using null coalescing operator
    $cardsHTML .= '<p>Event: ' . ($volunteer['Event']) . '</p>'; // Using null coalescing operator

    $cardsHTML .= '<a href="edit_volunteer.php?ID=' . $volunteer['ID'] . '" class="edit-btn">Edit</a>';
    
    $cardsHTML .= '<a href="processes/process.volunteer.php?action=delete&ID=' . $volunteer['ID'] . '" class ="delete-btn">Delete</a>';
    $cardsHTML .= '</div>';
}
?>
<div class="cards">
    <?php echo $cardsHTML; ?>
</div>
			<button id="myBtn">Add volunteer</button>
			<div id="myModal" class="modal">
				<div class="modal-content">
					<span class="close">&times;</span>
					<h2>Add Volunteer</h2>
					<form id="volunteerForm" method="POST" action="processes/process.volunteer.php?action=new">
						<label for="name">Name:</label>
						<input type="text" id="name" name="name" required>
						<br>
						<label for="email">Email:</label>
						<input type="email" id="email" name="email" required>
						<br>
						<label for="role">Role:</label>
						<select id="role" name="role" required>
							<option value="">Select a role</option>
							<option value="organizer">Organizer</option>
							<option value="helper">Helper</option>
							<option value="coordinator">Coordinator</option>
						</select>
						<br>
						<label for="Event">Event:</label>
                        <input type="text" id="event" name="event" required>
						<br>


						<input type="submit" value="Add Volunteer">
					</form>
				</div>
			</div>
		</div>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				var modal = document.getElementById("myModal");
				var btn = document.getElementById("myBtn");
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

			document.addEventListener("DOMContentLoaded", function() {
    // Existing modal code...

    // Function to view volunteer details and focus on the card
    window.viewVolunteer = function(id) {
        // Close any previously focused card by removing the focused class
        document.querySelectorAll('.card.focused-card').forEach(function(card) {
            card.classList.remove('focused-card');
        });
        
        // Find the card by ID and add the focused class
        var card = document.querySelector('.card[data-volunteer-id="' + id + '"]');
        if (card) {
            card.classList.add('focused-card');
            
            // Show overlay
            document.querySelector('.overlay').style.display = 'block';
        }
    };

    // Hide overlay and unfocus card when overlay is clicked
    document.querySelector('.overlay').addEventListener('click', function() {
        document.querySelectorAll('.card.focused-card').forEach(function(card) {
            card.classList.remove('focused-card');
        });
        this.style.display = 'none';
    });
});
			
		</script>
	</body>
</html>
