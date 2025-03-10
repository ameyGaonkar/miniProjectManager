<?php

require './../../scripts/connect.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        header('Location: ../index.php');
        exit();
    }

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    session_start();
    $_SESSION['username'] = $user['username'];
    header('Location: ../dashboard.php');
}
