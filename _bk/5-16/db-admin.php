<?php
function is_valid_admin($login, $pw) {
    global $db;
    $query = "SELECT staff_id FROM staff WHERE login = :login AND pw = :pw";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':login', $login);
        $statement->bindValue(':pw', $pw);
        $statement->execute();
        $valid = ($statement->rowCount() == 1);
        $statement->closeCursor();
        return $valid;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        $error_message = "<p>Error validating credentials: $error </p>";
        include 'error.php';
        exit();
    }
}
function get_voters() {
    global $db;
    $query = "SELECT first_name, last_name, email FROM mail";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $voters = $statement->fetchAll();
        $statement->closeCursor();
        return $voters;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        $error_message = "<p>Error running database query: $error </p>";
        include 'error.php';
        exit();
    }
}
function get_donations() {
    global $db;
    $query = "SELECT CONCAT(first_name, ' ', last_name) AS name,
                donation_date, donation_amount 
                FROM donations JOIN mail USING(voter_id)";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $donations = $statement->fetchAll();
        $statement->closeCursor();
        return $donations;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        $error_message = "<p>Error adding new voter: $error </p>";
        include 'error.php';
        exit();
    }
}
function get_staffs() {
    global $db;
    $query = "SELECT first_name, last_name, email, phone, login FROM staff";
    try {
        $statement = $db->prepare($query);
        $statement->execute();
        $staffs = $statement->fetchAll();
        $statement->closeCursor();
        return $staffs;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        $error_message = "<p>Error running database query: $error </p>";
        include 'error.php';
        exit();
    }
}



/***** 
add_staff will be used for adding new staff by admin
and when voters complete the volunteer form
******/
function add_staff($first_name, $last_name, $email, $phone, $login, $pw) {
    global $db;
    //  hash password concat with login to store     
    $query = 'INSERT INTO staff (first_name, last_name, email, phone, login, pw) 
                VALUES  (:first, :last, :email, :phone, :login, :pw)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':first', $first_name);
        $statement->bindValue(':last', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':login', $login);
        $statement->bindValue(':pw', $pw);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = $e->getMessage();
        //display $error_message in ./error.php page
        $error_message = "<p>Error adding new staff member: $error </p>";
        include 'error.php';
        exit();
    }
}
function add_voter($first_name, $last_name, $email, $phone, $registered) {
    global $db;
    $query = 'INSERT INTO mail
                (registered, first_name, last_name, email, phone)
              VALUES
                (:registered, :first, :last, :email, :phone)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':first', $first_name);
        $statement->bindValue(':last', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':registered', $registered);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = $e->getMessage();
        //display $error_message in ./error.php page
        $error_message = "<p>Error adding new voter: $error </p>";
        include 'error.php';
        exit();
    }
}
// function add_donation(parameters) {};
// how to check for existing voter in mail table, for voter_id parameter

?>