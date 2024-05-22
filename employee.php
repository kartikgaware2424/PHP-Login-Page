<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sport";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'sport');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if (isset($_POST['submit'])) {
    $playerName = $_POST['playerName'];
    $gameGenre = $_POST['gameGenre'];
    $score = $_POST['score'];

    $sql = "INSERT INTO SportsRegistration (playerName, gameGenre, score)
            VALUES ('$playerName', '$gameGenre', '$score')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sports Registration Form</title>
</head>
<body>
    <h2>Sports Registration Form</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Player Name: <input type="text" name="playerName" required><br><br>
        Game Genre: <input type="text" name="gameGenre" required><br><br>
        Score: <input type="number" name="score" required><br><br>
        <input type="submit" name='submit' value="Submit">
    </form>
</body>
</html>
