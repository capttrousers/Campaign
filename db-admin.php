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
    $query = "SELECT first_name, last_name, email, voter_id FROM mail";
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
function get_voter($voter_id) {
    global $db;
    $query = "SELECT * FROM mail WHERE voter_id = :voter_id";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':voter_id', $voter_id);
        $statement->execute();
        $voter = $statement->fetch();
        $statement->closeCursor();
        return $voter;
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
                FROM donations JOIN mail USING(voter_id)
                ORDER BY donation_date";
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
//*******    staffs vs staff         **********************
// get_staffs() is for ALL staff members
function get_staffs() {
    global $db;
    $query = "SELECT first_name, last_name, email, phone, login, staff_id "
            . "FROM staff ORDER BY staff_id";
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
// get_staff() is for INDIVIDUAL staff members
function get_staff($staff_id) {
    global $db;
    $query = "SELECT * FROM staff WHERE staff_id = :staff_id";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':staff_id', $staff_id);
        $statement->execute();
        $staff = $statement->fetch();
        $statement->closeCursor();
        return $staff;
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
function add_voter($first_name, $last_name, $registered, $email, $phone) {
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
function add_donator($first_name, $last_name, $street, $city, $state, $zip,
        $registered) {
    global $db;
    $query = 'INSERT INTO mail
                (registered, first_name, last_name, loc_street, loc_city,
                loc_state, loc_zip)
              VALUES
                (:registered, :first, :last, :street, :city, :state, :zip)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':first', $first_name);
        $statement->bindValue(':last', $last_name);
        $statement->bindValue(':street', $street);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip', $zip);
        $statement->bindValue(':registered', $registered);
        $statement->execute();
        $voter_id = $db->lastInsertId();
        $statement->closeCursor();
        return $voter_id;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        //display $error_message in ./error.php page
        $error_message = "<p>Error adding new donator: $error </p>";
        include 'error.php';
        exit();
    }
}
function add_donation($voter_id, $donation_amount, $payment_type) {
    global $db;
    $query = 'INSERT INTO donations
                (voter_id, donation_date, donation_amount, payment_type)
                VALUES
                (:voter_id, CURRENT_DATE(), :donation_amount, :payment_type)';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':donation_amount', $donation_amount);
        $statement->bindValue(':payment_type', $payment_type);
        $statement->bindValue(':voter_id', $voter_id);
        $statement->execute();
        $donation_id = $db->lastInsertId();
        $statement->closeCursor();
        return $donation_id;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        //display $error_message in ./error.php page
        $error_message = "<p>Error adding new donation: $error </p>";
        include 'error.php';
        exit();
    }
}
// EDIT VOTERS / STAFF
function edit_staff($first_name, $last_name, $phone, $email,
        $login, $pw, $staff_id) {
    global $db;
    $query = 'UPDATE staff SET
                first_name = :first, last_name = :last, email = :email, 
                phone = :phone, login = :login, pw = :pw 
                WHERE staff_id = :staff_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':first', $first_name);
        $statement->bindValue(':last', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':login', $login);
        $statement->bindValue(':pw', $pw);
        $statement->bindValue(':staff_id', $staff_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = $e->getMessage();
        //display $error_message in ./error.php page
        $error_message = "<p>Error editing staff information: $error </p>";
        include 'error.php';
        exit();
    }
}
function edit_voter($first_name, $last_name, $phone, $email, $birthday, 
        $street, $state, $voter_id, $zip, $city, $registered) {
    global $db;
    $query = 'UPDATE mail SET
                registered = :registered, first_name = :first, last_name = :last,
                email = :email, phone = :phone, birthday = :birthday, 
                loc_street = :street, loc_state = :state, loc_city = :city, 
                loc_zip = :zip WHERE voter_id = :voter_id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':first', $first_name);
        $statement->bindValue(':last', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':birthday', $birthday);
        $statement->bindValue(':street', $street);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':zip', $zip);
        $statement->bindValue(':voter_id', $voter_id);
        $statement->bindValue(':registered', $registered);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = $e->getMessage();
        //display $error_message in ./error.php page
        $error_message = "<p>Error editing voter information: $error </p>";
        include 'error.php';
        exit();
    }
}
?>