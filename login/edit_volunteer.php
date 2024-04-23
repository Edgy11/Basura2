<?php
// Start by including the Volunteer class to use its methods
include 'classes/class.volunteer.php';
$volunteer = new Volunteer();

// Check if the ID is set in the URL
if (isset($_GET['ID'])) {
    $volunteerID = $_GET['ID'];
    // Fetch the volunteer data by ID
    $volunteerData = $volunteer->fetchVolunteerById($volunteerID);
    // Assuming fetchVolunteerById returns an array with the volunteer's data
} else {
    // Redirect or handle the case where there is no ID in the URL
    header('Location: volunteer.php?error=NoIDProvided');
    exit;
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Edit Volunteer</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="css/Volunteer.css?<?php echo time();?>">
</head>
<body class="is-preload">
    <div class="modal-content">
        <h2>Edit Volunteer</h2>
        <form id="volunteerForm" method="POST" action="processes/process.volunteer.php?action=update_volunteer" enctype="multipart/form-data">
            <input type="hidden" id="ID" name="ID" value="<?php echo $volunteerData['ID']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value="<?php echo $volunteerData['Name']; ?>">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo $volunteerData['Email']; ?>">
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="">Select a role</option>
                <option value="organizer" <?php echo ($volunteerData['Role'] == 'organizer') ? 'selected' : ''; ?>>Organizer</option>
                <option value="helper" <?php echo ($volunteerData['Role'] == 'helper') ? 'selected' : ''; ?>>Helper</option>
                <option value="coordinator" <?php echo ($volunteerData['Role'] == 'coordinator') ? 'selected' : ''; ?>>Coordinator</option>
            </select>
            <label for="profile_pic">Profile Picture:</label>
            <input type="file" id="profile_pic" name="profile_pic">
            <input type="submit" value="Update Volunteer">
        </form>
    </div>
</body>
</html>
