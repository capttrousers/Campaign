<?php
    $dsn = 'mysql:host=localhost;dbname=skipduck_campaign';
    $username = 'skipduck_admin';
    $password = 'root123';
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    try {
        $db = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Error connecting to database: $error_message </p>";
        exit();
    }
?>