<?php

require 'connect.php';

$admissionNos = $_POST['students'];

if (!empty($_POST['topic']) && !empty($_POST['description']) && !empty($admissionNos[0]) && !empty($admissionNos[1])) {

    $con->beginTransaction();
    $insertProject = $con->prepare("INSERT INTO projects (topic, description) VALUES (:topic, :description)");
    $insertProject->bindParam(':topic', $_POST['topic']);
    $insertProject->bindParam(':description', $_POST['description']);

    if ($insertProject->execute()) {
        $projectID = $con->lastInsertId();

        foreach ($admissionNos as $admissionNo) {

            if (!empty($admissionNo)) {
                $insertTeam = $con->prepare("INSERT INTO projectmembers (projectId, studentId) 
                                            SELECT :projectID, id FROM students WHERE admissionNo = :admNo");
                $insertTeam->bindParam(':projectID', $projectID);
                $insertTeam->bindParam(':admNo', $admissionNo);
                $insertTeam->execute();
                if ($insertTeam->rowCount() == 0) {
                    $con->rollBack();
                    echo json_encode(array('status' => 'error', 'message' => 'Admission Number Not Found'));
                    die();
                }
            }
        }
        $con->commit();
        echo json_encode(array('status' => 'success', 'message' => 'Project Submitted Successfully'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Please fill all the fields properly'));
}
