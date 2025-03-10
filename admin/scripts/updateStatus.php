<?php

require './../../scripts/connect.php';

$updateStatus = $con->prepare("UPDATE projects SET status = :status WHERE id = :projectId");
$updateStatus->bindParam(':status', $_POST['projectStatus']);
$updateStatus->bindParam(':projectId', $_POST['projectId']);
if ($updateStatus->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update status']);
}
