<?php 
    header('Content-Type: application/json');
    // db configuration
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "campaign_feedback";

    // capture form data with basic sanitization
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $feedback = htmlspecialchars($_POST['feedback']);
    $rating = (int) $_POST['rating']; 

    // establish connection to the db
    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection status
    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => 'connection failed: ' . $conn->connect_error]);
        exit();
    }

    // Add user input to the db (bind)
    $stmt = $conn->prepare("INSERT INTO feedback (name, email, feedback, rating) VALUES (?, ?, ?, ?)");
    
    if ($stmt) {
        $stmt->bind_param("sssi", $name, $email, $feedback, $rating);

        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Feedback submitted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error while submitting. Please try again!']);
        }

        // close the statement
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to prepare the statement']);
    }

    // close the connection
    $conn->close();
?>