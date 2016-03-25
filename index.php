<?php
// TODO:
// implement better session controls
// set session cookie for < 20 minutes
// resume session as needed
session_start();  

// db connection
require_once('./database.php');
// db functions: select, insert, update
require_once('./db-admin.php');

$action = filter_input(INPUT_POST, 'action');

if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'home';
    }
}

// TODO:
// implement password hashing

// TODO:
// implement different permission levels:
// admin can add voters, staff, and donations
// admin can edit voters and staff
// other staff can add voters, donations

switch ($action) {
    case 'home':
        // go to campaign home
        include('campaign.php');
        break;
    case 'admin':
        if(!isset($_SESSION['is_valid_admin'])){
            $login_message = "You must login to view this page.";
            include ('login.php');
        } else {
            include 'admin.php';
        }
        break;
    case 'login':
        $login = filter_input(INPUT_POST, 'login');
        $pw = filter_input(INPUT_POST, 'pw');
        if(is_valid_admin($login, $pw)) {
            $_SESSION['is_valid_admin'] = true;
            header('Location: .?action=admin');
        } else {
            $login_message = "You must login to view this page.";
            include ('./login.php');
        }
        break;
    case 'list-voters':
        $voters = get_voters();
        include('list-voters.php');
        break;
    case 'list-staff':
        $staffs = get_staffs();
        include 'list-staff.php';
        break;
    case 'list-donations':
        $donations = get_donations();
        include 'list-donations.php';
        break;
    case 'logout':
        $_SESSION = array();
        session_destroy();
        $login_message = 'You have been logged out.';
        include ('login.php');
        break;

    case 'add-voter-form':
        include 'add-voter.php';
        break;
    case 'add-staff-form':
        include 'add-staff.php';
        break;
    case 'add-staff':
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $login = filter_input(INPUT_POST, 'login');
        $pw = filter_input(INPUT_POST, 'pw');
        if($first_name === NULL || $last_name === NULL || $phone === NULL || 
                $email === NULL || $email === FALSE || $login === NULL || 
                $pw === NULL) {
            $add_staff_error = "<p>Please enter valid staff information.</p>";
            include 'add-staff.php';
        } else {
            add_staff($first_name, $last_name, $email, $phone, $login, $pw);
            header('Location: .?action=list-staff');
        }
        break;
    case 'add-voter':
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $registered = filter_input(INPUT_POST, 'registered');
        if($first_name === NULL || $last_name === NULL || $phone === NULL || 
                $email === NULL || $email === FALSE || $registered === NULL) {
            $add_voter_error = "<p>Please enter valid voter information.</p>";
            include 'add-voter.php';
        } else {
            add_voter($first_name, $last_name, $registered, $email, $phone);
            header('Location: .?action=list-voters');
        }
        break;
    case 'add-volunteer':
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $login = filter_input(INPUT_POST, 'login');
        $pw = filter_input(INPUT_POST, 'pw');
        if($first_name === NULL || $last_name === NULL || $phone === NULL || 
                $email === NULL || $login === NULL|| $pw === NULL) {
            $add_volunteer_error = "<p>Please enter valid volunteer information.</p>";
            include 'volunteer.php';
        } else {
            add_staff($first_name, $last_name, $email, $phone, $login, $pw);
            $thankyou_message = '
                <h3>Thank you for registering to volunteer!</h3>
                <h3>You will be contacted soon by the campaign.</h3>
                <p>You may now login with the credentials you created:</p>
                <h4><a href="login.php">Log In</a></h4>';
            include ('thankyou.php');
        }
        break;
    case 'donate':
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $street = filter_input(INPUT_POST, 'street');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);
        $payment_type = filter_input(INPUT_POST, 'payment_type');
        $amount = filter_input(INPUT_POST, 'donation_amount', FILTER_VALIDATE_FLOAT);
        $registered = 'Yes';
        if ($first_name === NULL || $last_name === NULL || $street === NULL || 
            $city === NULL || $state === NULL || $zip === NULL || $zip === FALSE 
            || $payment_type === NULL || $amount === NULL || $amount === FALSE) 
        {
            $donate_error = '<p>Please enter valid information to Donate.</p>';
            include 'donate.php';
        } else {    
            $voter_id = add_donator($first_name, $last_name, $street, $city, 
                    $state, $zip, $registered);
            $donation_amount = round($amount, 2);
            $donation_id = add_donation($voter_id, $donation_amount, $payment_type);
            $thankyou_message = "
                <h3>Thank you for your donation!</h3>
                <h3>Your donation ID is: $donation_id, 
                you may keep this for your records.</h3>";
            include 'thankyou.php';
        }
        break;
    case 'add-donation-form':
        $voter_id = filter_input(INPUT_POST, 'voter_id', FILTER_VALIDATE_INT);
        $voter = get_voter($voter_id);
        include 'add-donation.php';
        break;
    case 'add-donation':
        $payment_type = filter_input(INPUT_POST, 'payment_type');
        $amount = filter_input(INPUT_POST, 'donation_amount', FILTER_VALIDATE_FLOAT);
        $voter_id = filter_input(INPUT_POST, 'voter_id', FILTER_VALIDATE_INT);
        if($payment_type === NULL || $amount === NULL || $amount === FALSE ||
                $voter_id === NULL || $voter_id === FALSE) {
            $donate_error = '<p>Please enter valid information to add donation.</p>';
            include 'donate.php';
        } else {
            $donation_amount = round($amount, 2);
            $donation_id = add_donation($voter_id, $donation_amount, $payment_type);
            header('Location: .?action=list-donations');
        }
        break;
//  edit staff/voter form gets the individual voter/staff information
//  and includes the input form php file which takes the input and 
//  actions to edit-voter/staff which updates db and 
//  includes list of voters/staff
    case 'edit-voter-form':
        $voter_id = filter_input(INPUT_POST, 'voter_id');
        $voter = get_voter($voter_id);
        include 'edit-voter.php';
        break;
    case 'edit-staff-form':
        $staff_id= filter_input(INPUT_POST, 'staff_id');
        $staff = get_staff($staff_id);
        include 'edit-staff.php';
        break;  
    case 'edit-voter':
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $birthday = filter_input(INPUT_POST, 'birthday');
        $street = filter_input(INPUT_POST, 'street');
        $state = filter_input(INPUT_POST, 'state');
        $voter_id = filter_input(INPUT_POST, 'voter_id', FILTER_VALIDATE_INT);
        $zip = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);
        $city = filter_input(INPUT_POST, 'city');
        $registered = filter_input(INPUT_POST, 'registered');
        if($first_name === NULL || $last_name === NULL || $phone === NULL || 
                $email === NULL || $email === FALSE || $registered === NULL || 
                $birthday === NULL || $state === NULL || $city === NULL || 
                $street === NULL || $zip === NULL || $zip === FALSE || 
                $voter_id === NULL || $voter_id === FALSE) {
            $edit_voter_error = "Please enter valid voter information.";
            $voter = get_voter($voter_id);
            include 'edit-voter.php';
        } else {
            $edit_voter_error = '';
            edit_voter($first_name, $last_name, $phone, $email, 
                    $birthday, $street, $state, $voter_id, $zip, $city, $registered);
            header('Location: .?action=list-voters');
        }
        break;      
    case 'edit-staff':
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $phone = filter_input(INPUT_POST, 'phone');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $staff_id = filter_input(INPUT_POST, 'staff_id', FILTER_VALIDATE_INT);
        $login = filter_input(INPUT_POST, 'login');
        $pw = filter_input(INPUT_POST, 'pw');
        if($first_name === NULL || $last_name === NULL || $phone === NULL || 
                $email === NULL || $email === FALSE || $staff_id === NULL || 
                $staff_id === FALSE || $login === NULL || $pw === NULL) {
            $edit_staff_error = "Please enter valid staff information.";
            $staff = get_staff($staff_id);
            include 'edit-staff.php';
        } else {
            $edit_staff_error = '';
            edit_staff($first_name, $last_name, $phone, $email, 
                    $login, $pw, $staff_id);
            header('Location: .?action=list-staff');
        }
        break;
}
?>