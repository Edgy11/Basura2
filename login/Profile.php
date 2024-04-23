<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Design</title>
    <link rel="stylesheet" href="css/Profile.css">
</head>
<body>

<div id="main">
    <div class="inner">
        <a href="index.php" class="back-button">Back</a>
        <h1>Update Your Profile</h1>
        <form>
            <div class="row gtr-50">
                <div class="col-6">
                    <input type="text" name="first-name" id="first-name" placeholder="First Name" />
                </div>
                <div class="col-6">
                    <input type="text" name="last-name" id="last-name" placeholder="Last Name" />
                </div>
                <div class="col-6">
                    <input type="email" name="email" id="email" placeholder="Email" />
                </div>
                <div class="col-6">
                    <input type="password" name="password" id="password" placeholder="Password" />
                </div>
                <div class="col-12">
                    <input type="file" name="profile-picture" id="profile-picture" />
                </div>
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Update Profile" /></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
