<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Result</title>
    <link rel="stylesheet" href="feedback.css">
</head>
<body>
    <h2>Feedback Data</h2>

    <?php
        // db Config
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "campaign_feedback";

        // connect to database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // check connection
        if ($conn->connect_error) {
            die("Error connecting to database: " . $conn->connect_error);
        }

        // retrieve feedback
        $sql = "SELECT id, name, email, feedback, rating, submission_date FROM feedback ORDER BY submission_date DESC";

        // Execute the query
        $result = $conn->query($sql);

        // validate results
        if ($result->num_rows > 0) {
            // Display data in a table
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Feedback</th><th>Rating</th><th>Submission Date</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['feedback'] . "</td>";
                echo "<td>" . $row['rating'] . "</td>";
                echo "<td>" . $row['submission_date'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No feedback available.";
        }

        // close the connection
        $conn->close();
    ?>
</body>
</html>
