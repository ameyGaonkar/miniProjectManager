<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <form method="POST" action="submitTopicScript.php">
                <div class="inputGroup">
                    <label for="student">Who are you?</label>
                    <input type="number" id="student" name="student" placeholder="Your Admission Number" required>
                </div>
                <div class="inputGroup">
                    <input type="submit" value="Check Status">
                </div>
            </form>
        </div>
    </div>

    <script src="main.js"></script>
</body>

</html>