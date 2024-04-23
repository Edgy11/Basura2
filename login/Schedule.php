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
        <div class="container">
        <!-- Containers 1 through 5 -->
        <div class="box" id="container1">
            <button class="toggle-btn" onclick="toggleStatus(1)">Inactive</button>
            <div class="info">
                <p>Truck Number: <span id="truck1">1</span></p>
                <p>Day: <span id="date1">Monday</span></p>
                <p>Barangay: <span id="location1">Bata</span></p>
                <p>Time: <span id="place1">8am</span></p>
            </div>
        </div>
        <!-- Repeat structure for containers 2 through 5 below, with adjusted IDs and data -->
        <div class="box" id="container2">
            <button class="toggle-btn" onclick="toggleStatus(2)">Inactive</button>
            <div class="info">
                <p>Truck Number: <span id="truck2">2</span></p>
                <p>Day: <span id="date2">Monday</span></p>
                <p>Barangay: <span id="location2">Mandalagan</span></p>
                <p>Time: <span id="place2"> 9am</span></p>
            </div>
        </div>
        <div class="box" id="container3">
            <button class="toggle-btn" onclick="toggleStatus(3)">Inactive</button>
            <div class="info">
                <p>Truck Number: <span id="truck3">3</span></p>
                <p>Day: <span id="date3">Tuesday</span></p>
                <p>Barangay: <span id="location3">Taculing</span></p>
                <p>Time: <span id="place3"> 10am</span></p>
            </div>
        </div>
        <div class="box" id="container4">
            <button class="toggle-btn" onclick="toggleStatus(4)">Inactive</button>
            <div class="info">
                <p>Truck Number: <span id="truck4">4</span></p>
                <p>Day: <span id="date4">Sunday</span></p>
                <p>Barangay: <span id="location4">Seven</span></p>
                <p>Time: <span id="place4">11am</span></p>
            </div>
        </div>
        <div class="box" id="container5">
            <button class="toggle-btn" onclick="toggleStatus(5)">Inactive</button>
            <div class="info">
                <p>Truck Number: <span id="truck5">5</span></p>
                <p>Day: <span id="date5">Saturday</span></p>
                <p>Barangay: <span id="location5">Ten</span></p>
                <p>Time: <span id="place5">8am</span></p>
            </div>
        </div>
    </div>
    
       


     <script>
       
        function toggleStatus(containerId) {
            var button = document.querySelector('#container' + containerId + ' .toggle-btn');
            
            if (button.innerHTML === 'Inactive') {
                button.innerHTML = 'Active';
                button.classList.add('active');
            } else {
                button.innerHTML = 'Inactive';
                button.classList.remove('active');
            }
        }
    </script>

</body>
</html>