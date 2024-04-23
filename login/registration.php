

<!DOCTYPE html>
<html>
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Protest+Riot&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
</head>
<body>
<div id="brand-block">
    <h2>Basura</h2>
</div>
<body class="login-body">
<div id="login-block">
	<h3> Register</h3>
    <div id="error-message" class="error-message"></div> <!-- Placeholder for the error message -->
    <form method="POST" action="processes/process.user.php?action=new" onsubmit="return validatePasswords()">
	<div>
    <input type="text" id="fname" class="input" name="firstname" placeholder="Your name..">
	</div>
	<div>
    <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name..">
	</div>
    <div>
    <select id="access" name="access">
              <option value="staff">Staff</option>
              <option value="supervisor">Supervisor</option>
              <option value="Manager">Manager</option>
            </select>
        </div>
    <div>
    <input type="email" id="email" class="input" name="email" placeholder="Your email..">
	</div>	<div>
    <div>
    <div class="password-wrapper">
    <input type="password" id="password" class="input" name="password" placeholder="Enter password.." onkeyup="checkPasswordStrength()">
    <i id="toggle-password" class="fas fa-eye" onclick="togglePasswordVisibility()"></i>
</div>


<div id="password-strength" class="password-strength"></div>

    
	</div>	<div>
    <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password..">
	</div>
    <div>
            <input type="submit" name="submit" value="Register" class="signin-button"/>
        </div>
        <div>
           
            <button onclick="location.href='login.php'" class="signin-button">Sign In</button>
        </div>
	
	</form>
	</form>
</div>

</body>


	<script>

        

function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var toggle = document.getElementById('toggle-password');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggle.classList.remove('fa-eye');
        toggle.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggle.classList.remove('fa-eye-slash');
        toggle.classList.add('fa-eye');
    }
}

function checkPasswordStrength() {
    const strengthIndicator = document.getElementById('password-strength');
    const password = document.getElementById('password').value;
    let strength = 0;

    if (password.length >= 8) strength += 1; // Length at least 8
    if (password.match(/(?=.*[0-9])/)) strength += 1; // Contains a digit
    if (password.match(/(?=.*[!@#$%^&*])/)) strength += 1; // Contains a special character
    if (password.match(/(?=.*[a-z])/)) strength += 1; // Contains a lowercase letter
    if (password.match(/(?=.*[A-Z])/)) strength += 1; // Contains an uppercase letter

    switch (strength) {
        case 0:
            strengthIndicator.textContent = '';
            strengthIndicator.style.display = 'none';
            break;
        case 1:
            strengthIndicator.textContent = 'Weak';
            strengthIndicator.style.color = 'red';
            break;
        case 2:
            strengthIndicator.textContent = 'Medium';
            strengthIndicator.style.color = 'orange';
            break;
        case 3:
        case 4:
            strengthIndicator.textContent = 'Strong';
            strengthIndicator.style.color = 'green';
            break;
        case 5:
            strengthIndicator.textContent = 'Very Strong';
            strengthIndicator.style.color = 'darkgreen';
            break;
    }
    strengthIndicator.style.display = 'block';
}


      

       function validatePasswords() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmpassword').value;
        const errorMessage = document.getElementById('error-message');

        // Clear previous timeouts to prevent multiple messages fading out at the wrong time
        clearTimeout(window.errorMessageTimeout);

        if (password !== confirmPassword) {
            errorMessage.textContent = 'Passwords do not match.';
            errorMessage.style.visibility = 'visible'; // Make sure it's visible
            errorMessage.style.opacity = '1'; // Reset opacity in case it was faded out before
            errorMessage.classList.remove('hidden'); // Remove hidden class if it was added before

            // Set timeout to fade out the error message
            window.errorMessageTimeout = setTimeout(function() {
                errorMessage.style.opacity = '0';
                // Use another timeout to match the transition duration and then hide the element
                setTimeout(function() {
                    errorMessage.classList.add('hidden');
                }, 500); // Match this with your transition duration
            }, 3000); // 3 seconds before starting to fade out
        } else {
            errorMessage.textContent = ''; // Clear the message if passwords match
            errorMessage.classList.add('hidden');
        }
        return password === confirmPassword;
    }

window.addEventListener('DOMContentLoaded', (event) => {
    const errorNotif = document.getElementById('error_notif');
    if(errorNotif) {
        setTimeout(() => {
            errorNotif.style.display = 'none';
        }, 1000); // Hides the notification after 5 seconds
    }

});




</script>

</html>