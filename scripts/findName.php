<?php

require 'connect.php';

$stmt = $con->prepare("SELECT id,name FROM students WHERE admissionNo = :admNo");
$stmt->bindParam(':admNo', $_POST['admNo']);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
    $check = $con->prepare("SELECT * FROM projectmembers WHERE studentId = :studentId");
    $check->bindParam(':studentId', $student['id']);
    $check->execute();
    if ($check->rowCount() > 0) {
        echo json_encode(array('status' => 'error', 'message' => 'Student already in a team'));
        die();
    } else {
        echo json_encode(array('status' => 'success', 'data' => $student['name']));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Admission Number Not Found'));
}
