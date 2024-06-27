<?php 
    // db configuration
    $servername = "localhost";
    $username = "root@localhost";
    $password= "root";
    $dbname = "campaign_feedback";

    //capture form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];

    //establish connnection to the db
    $conn = new mysli($servername, $username, $password, $dbname);

    //check connection status
    if($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }

    // Add user input to the db (bind)
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, feedback, rating) VALUES (?, ?, ?, ?)");
    $stmt -> bind_param("sssi", $name, $email, $feedback, $rating);

    // Execute the query
    if ($stmt->execute()) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error while submitting. Please try again!";
    }

    // close the connection
    $stmt->close();
    $conn->close();
?>