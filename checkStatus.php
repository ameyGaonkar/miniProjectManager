<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="style.css">
    <title>MPM - Home</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <a href="index.php">Submit Topic</a>
            <a href="checkStatus.php" class="active">Check Status</a>
        </div>
        <div class="content">
            <h2>Verifying...</h2>
            <form id="checkStatusForm">
                <div class="inputGroup">
                    <label for="student">Who are you?</label>
                    <input type="number" id="student" name="student" placeholder="Your Admission Number" required>
                </div>
                <div class="inputGroup">
                    <input type="button" value="Check Status" onclick="displayStatus()">
                </div>
            </form>
            <div id="projectSection">
            </div>
        </div>
    </div>

    <script src="main.js"></script>
</body>

</html>