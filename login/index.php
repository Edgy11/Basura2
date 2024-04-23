<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>BASURA.COM</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/index.css">
        
	</head>
  
	<body class="is-preload">

  
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">
              

							<!-- Header -->
								<header id="header">
									<a href="index.html" class="logo"><strong>BASURA</strong> BY WHO</a>
                  <div class="header-logo">
                     <img src="../login/css/img/basura1.png" alt="Project Basura Logo" />
									
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
										<header>
											<h1>WHAT IS PROJECT BASURA?
											</h1>
											<p>A GOAL TO MAKE OUR CITY MORE CLEAN ENVIRNOMENT</p>
										</header>
										<p> To clean our environment because it directly impacts our health and well-being. Pollution and waste can harm ecosystems, wildlife, and natural resources. By keeping our environment clean, we ensure a sustainable future for generations to come.</p>
										<ul class="actions">
											<li><a href="#" class="button big">Learn More</a></li>
										</ul>
									</div>
									<span class="image object">
										<img src="css/img/Basura.jpg" alt="" />
									</span>
								</section>
								<section>
									<header class="major">
									
						</div>
					</div>

				
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
										<li>
											
									</ul>
								</nav>

							
								<section>
									

								<section>
									<header class="major">
										<h2>Background</h2>
									</header>
									<p>Project Basura was founded in 2024 with a clear mission: to provide efficient and eco-friendly waste management solutions to communities and businesses. Recognizing the growing need for responsible waste disposal, our company started with just a handful of employees and a few trucks.

The past few months, Project Basura has grown into a trusted name in the industry, serving both residential and commercial clients across the region. We offer a range of services, including curbside collection, recycling programs, dumpster rentals, and hazardous waste disposal.</p>
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="#">Basura@gmail.com</a></li>
										<li class="icon solid fa-phone">0912341212</li>
										<li class="icon solid fa-home">Kabanakalan City<br />
										Negros Occidental</li>
									</ul>
								</section>

								<footer id="footer">
									<p class="copyright">&copy; Untitled. All rights reserved. <a href="https://unsplash.com"></a>.  <a href=""></a>.</p>
								</footer>

						</div>

            <div id="uniqueModal" class="unique-modal">
    <div class="modal-overlay"></div>
    <div class="modal-container">
        <div class="modal-header">
            <h2>Discover Project Basura</h2>
            <button id="closeModal" class="modal-close-btn">&times;</button>
        </div>
        <div class="modal-content">
            <p>Welcome to <strong>Project Basura</strong>, a pioneering initiative dedicated to sustainability and environmental stewardship. Join us as we embark on a journey to:</p>
            <ul>
                <li>Revolutionize waste management with innovation.</li>
                <li>Foster community engagement for a cleaner tomorrow.</li>
                <li>Drive policy change for sustainable urban development.</li>
            </ul>
            <p>Together, we can redefine our relationship with the environment.</p>
        </div>
        
    </div>
</div>




                        
                        <div class="parent-container"> 
  <div id="Wrapper">
    <a href="Profile.php">Settings</a> |
    <a href="logout.php">Log Out</a> |
    <span><?php echo $user->get_user_lastname($user_id).', '.$user->get_user_firstname($user_id); ?></span>
  </div>
</div>

					</div>
                    <div id="content">
    <?php
      switch($page){
                case 'settings':
                    require_once 'settings-module/index.php';
                break; 
                case 'module_two':
                    require_once 'module-folder';
                break; 
                case 'module_xxx':
                    require_once 'module-folder';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>

  <script>
document.addEventListener('DOMContentLoaded', () => {
    const showModal = document.getElementById('uniqueModal');
    const closeModal = document.getElementById('closeModal');
    const modalContainer = document.querySelector('.modal-container');

    document.querySelector('.button.big').addEventListener('click', () => {
        showModal.style.display = 'flex';
        setTimeout(() => modalContainer.style.transform = 'scale(1)', 10); // Slight delay for the transform
    });

    closeModal.addEventListener('click', () => {
        modalContainer.style.transform = 'scale(0.9)';
        setTimeout(() => showModal.style.display = 'none', 400); // Delay to sync with the transform animation
    });

    window.addEventListener('click', (event) => {
        if (event.target === showModal.querySelector('.modal-overlay')) {
            modalContainer.style.transform = 'scale(0.9)';
            setTimeout(() => showModal.style.display = 'none', 400);
        }
    });
});

</script>

</html>