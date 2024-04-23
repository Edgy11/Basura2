<?php

include '../classes/class.user.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_user();
	break;
    case 'update':
        update_user();
	break;
    
    case 'delete':
        delete_user();
    break;
}

function create_new_user(){
	$user = new User();
    $email = $_POST['email'];
    $existing_user_id = $user->get_user_id($email);
    if($existing_user_id){
        // Email already exists, redirect back with an error message
        $_SESSION['error'] = 'Email already exists. Please choose a different email.';
        header('Location: ../registration.php');
        exit();
    }
    $lastname = ucwords($_POST['lastname']);
    $firstname = ucwords($_POST['firstname']);
    $access = ucwords($_POST['access']);
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    

       
    
    if($password !== $confirmpassword) {
        // Use session to pass the error message
        $_SESSION['error'] = 'Passwords do not match.';
        
        // Corrected redirect, assuming registration.php is in the parent directory of processes
        header('Location: ../registration.php');
        exit();
    }

    $result = $user->new_user($email, $password, $lastname, $firstname, $access);
    if($result){
        // Possibly clear the session error message here
        unset($_SESSION['error']);

        $id = $user->get_user_id($email);
        header('Location: ../index.php?page=settings&subpage=users&action=profile&id='.$id);
    }
    // Consider adding an else block here to handle failures in creating a new user
}


function update_user(){
	$user = new User();
    $user_id = $_POST['userid'];
    $lastname = ucwords($_POST['lastname']);
    $firstname = ucwords($_POST['firstname']);
    $access = ucwords($_POST['access']);
   
    
    $result = $user->update_user($lastname,$firstname,$access,$user_id);
    if($result){
        header('location: ../index.php?page=settings&subpage=users&action=profile&id='.$user_id);
    }
}



function delete_user(){
    $user = new User();
    $user_id = $_POST['userid']; 
    $result = $user->delete_user($user_id);
    if($result){
        // Redirect to a confirmation page or the users list after deletion
        header('location: ../index.php?page=settings&subpage=users&message=User Deleted Successfully');
    } else {
        // Handle deletion failure (e.g., user not found)
        header('location: ../index.php?page=settings&subpage=users&error=Failed to Delete User');
    }
}
