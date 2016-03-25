<?php
session_start();    
require_once('./database.php');
require_once('./db-admin.php');

$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}
// move this to each case
$voters = get_voters();
$donations = get_donations();
$staffs = get_staffs();



switch ($action) {
    case 'home':
        // go to campaign home
        include('campaign.html');
        break;
    case 'donate':
        include 'donate.html';
        break;
    case 'login':
        $login = filter_input(INPUT_POST, 'login');
        $pw = filter_input(INPUT_POST, 'pw');
        if(is_valid_admin($login, $pw)) {
            $_SESSION['is_valid_admin'] = true;
            include 'admin.html';
        } else {
            $login_message = "You must login to view this page.";
            include 'login.php';
        }
        break;
    case 'list-voters':
        include('voter-list.php');
        break;
    case 'add-volunteer':
        include 'list-staff.php';
        break;
    case 'add-staff':
        include 'list-staff.php';
        break;
    case 'add-voter':
        include('voter-list.php');
        break;
    case 'add-donation':
        include 'list-donations.php';
        break;
    case 'list-staff':
        include 'list-staff.php';
        break;
    case 'list-donations':
        include 'list-donations.php';
        break;
}
?>