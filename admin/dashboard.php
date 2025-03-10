<?php
session_start();


if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Dashboard: <?php echo $_SESSION['username']; ?></title>
</head>


<body>
    <div class="nav"><a href="scripts/logout.php">Logout</a></div>
    <div class="container">
        <div class="wrapper">

            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Project</th>
                        <th>Members</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    require './../scripts/connect.php';

                    $srNo = 1;
                    $getProjects = $con->prepare("SELECT * FROM projects ORDER BY status DESC, createdAt ASC");
                    $getProjects->execute();

                    if ($getProjects->rowCount() > 0) {
                        $projects = $getProjects->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($projects as $project) {
                            $getMembers = $con->prepare("SELECT students.name FROM projectmembers,students WHERE projectmembers.studentId=students.id AND projectmembers.projectId = :projectId");
                            $getMembers->bindParam(':projectId', $project['id']);
                            $getMembers->execute();
                            $members = $getMembers->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                            <tr>
                                <td><?php echo $srNo; ?>.</td>
                                <td width="50%">
                                    <h2 class="projectTitle"><?php echo $project['topic']; ?></h2>
                                    <p class="dateDisplay"><?php echo date('d M Y, h:ia', strtotime($project['createdAt'])); ?></p>
                                    <div class="projectDescription">
                                        <?php echo $project['description']; ?>
                                    </div>
                                </td>
                                <td>
                                    <ul>
                                        <?php
                                        foreach ($members as $member) {
                                            echo "<li>" . $member['name'] . "</li>";
                                        }
                                        ?>
                                    </ul>
                                </td>
                                <td>
                                    <input type="hidden" name="projectId" value="<?php echo $project['id']; ?>">
                                    <select name="projectStatus" onchange="updateStatus(this)">
                                        <option value="Pending" <?php echo $project['status'] == 'Pending' ? 'selected' : NULL; ?>>Pending</option>
                                        <option value="Approved" <?php echo $project['status'] == 'Approved' ? 'selected' : NULL; ?>>Approved</option>
                                        <option value="Rejected" <?php echo $project['status'] == 'Rejected' ? 'selected' : NULL; ?>>Rejected</option>
                                    </select>
                                </td>
                            </tr>
                    <?php
                            $srNo++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="main.js"></script>
</body>

</html>