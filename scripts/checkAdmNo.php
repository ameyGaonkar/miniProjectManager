<?php

// require 'connect.php';

// $stmt = $con->prepare("SELECT name FROM students WHERE admNo = :admNo");
// $stmt->bindParam(':admNo', $_POST['admNo']);
// $stmt->execute();

// if ($stmt->rowCount() > 0) {
//     $student = $stmt->fetch(PDO::FETCH_ASSOC);
//     echo json_encode(array('status' => 'success', 'data' => $student['name']));
// } else {
//     echo json_encode(array('status' => 'error', 'data' => 'Admission Number Not Found'));
// }

echo json_encode(array('status' => 'success', 'data' => 'Amey Gaonkar'));
