<?php

require 'connect.php';

$getStudent = $con->prepare("SELECT * FROM students WHERE admissionNo = :admNo");
$getStudent->bindParam(':admNo', $_POST['admNo']);
$getStudent->execute();

if ($getStudent->rowCount() > 0) {
    $student = $getStudent->fetch(PDO::FETCH_ASSOC);
    $getProject = $con->prepare("SELECT projects.id, projects.topic, projects.description, projects.status FROM projects,projectmembers WHERE projectmembers.studentId = :studentId  AND projectmembers.projectId = projects.id");
    $getProject->bindParam(':studentId', $student['id']);
    $getProject->execute();
    if ($getProject->rowCount() == 0) {
        echo json_encode(array('status' => 'error', 'message' => 'No Project Found'));
        die();
    }
    $project = $getProject->fetch(PDO::FETCH_ASSOC);
    $team = $con->prepare("SELECT students.admissionNo, students.name FROM students,projectmembers WHERE projectmembers.projectId = :projectId AND projectmembers.studentId = students.id");
    $team->bindParam(':projectId', $project['id']);
    $team->execute();
    $project['team'] = $team->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(array('status' => 'success', 'data' => array('topic' => $project['topic'], 'status' => $project['status'], 'team' => $project['team'])));
} else {
    echo json_encode(array('status' => 'error', 'message' => 'No Student Found'));
}
