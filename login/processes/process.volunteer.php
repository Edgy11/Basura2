<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include '../classes/class.volunteer.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
    case 'new':
        create_new_volunteer();
        break;

   
    case 'delete':
        delete_volunteer();
        break;
    case 'update_volunteer':
        update_volunteer();
        break;
}

function update_volunteer(){
    $volunteer = new Volunteer();
    $volunteerID = $_POST['ID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    
    // Handle profile picture upload
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $profile_pic = $_FILES['profile_pic']['name'];
        $profile_pic_temp = $_FILES['profile_pic']['tmp_name'];
        move_uploaded_file($profile_pic_temp, '../profilepics/' . $profile_pic);
    } else {
        $profile_pic = ''; // No new profile picture uploaded
    }
    
    $result = $volunteer->update_volunteer($volunteerID, $name, $email, $role, $profile_pic);
    if($result){
        header('Location: ../volunteer.php?message=Volunteer Updated Successfully');
    } else {
        header('Location: ../volunteer.php?error=Failed to Update Volunteer');
    }
}

function create_new_volunteer(){
    $volunteer = new Volunteer();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event = $_POST['event']; // Capture the event field
    $role = $_POST['role'];

    $result = $volunteer->new_volunteer($name, $email, $event, $role);
    if($result){
        header('Location: ../volunteer.php?message=Volunteer Added Successfully');
    } else {
        header('Location: ../volunteer.php?error=Failed to Add Volunteer');
    }
}

function delete_volunteer(){
    $volunteer = new Volunteer();
    $volunteerID = $_GET['ID']; 
    $result = $volunteer->delete_volunteer($volunteerID);
    if($result){
        header('Location: ../volunteer.php?message=Volunteer deleted Successfully');
    } else {
        header('Location: ../volunteer.php?error=Failed to delete Volunteer');
    }
}

// Fetch all volunteers
$volunteer = new Volunteer();
$volunteerData = $volunteer->fetchAllVolunteers();

// Now you can use $volunteerData to display volunteer information on your webpage
?>
