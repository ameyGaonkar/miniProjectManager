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
            <a href="index.php" class="active">Submit Topic</a>
            <a href="checkStatus.php">Check Status</a>
        </div>
        <div class="content">
            <h2>Lets begin...</h2>
            <form method="POST" action="submitTopicScript.php">
                <div class="inputGroup">
                    <label for="student1">Who are you?</label>
                    <input type="number" id="student1" name="student1" placeholder="Your Admission Number" required>
                </div>
                <div class="inputGroup">
                    <label for="student2">Your Teammate 1</label>
                    <input type="number" id="student2" name="student2" placeholder="Teammate 1: Admission Number" required>
                </div>
                <div class="inputGroup optionalTeammate">
                    <label for="student3">Your Teammate 2</label>
                    <input type="number" id="student3" name="student3" placeholder="Teammate 2: Admission Number" required>
                </div>
                <div class="inputGroup optionalTeammate">
                    <label for="student4">Your Teammate 3</label>
                    <input type="number" id="student4" name="student4" placeholder="Teammate 3: Admission Number" required>
                </div>
                <div class="inputGroup">
                    <input type="button" value="Add Teammate" onclick="addTeammate()">
                    <input type="button" value="Remove Teammate" onclick="removeTeammate()">
                </div>
                <div class="inputGroup">
                    <label for="topic">Your Project idea?</label>
                    <input type="text" id="topic" name="topic" placeholder="Enter your Topic" required>
                </div>
                <div class="inputGroup">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Enter your Description" rows="8" required></textarea>
                </div>
                <div class="inputGroup">
                    <input type="submit" value="Submit Topic">
                </div>
            </form>
        </div>
    </div>

    <script src="main.js"></script>
</body>

</html>