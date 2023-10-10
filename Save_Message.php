<?php
require('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Get the client_id from the session
    if (isset($_SESSION['client_id'])) {
        $client_id = $_SESSION['client_id'];
    } else {
        // Handle the case where the user is not logged in.
        echo "Error: User not logged in.";
        exit();
    }

    // Validate that the "message" field is not empty
    if (empty($message)) {
        echo "Error: Message cannot be empty.";
    } else {
        // Insert the data into the message table
        $sql = "INSERT INTO `message` (`subject`, `message`, `date`, client_id) VALUES (?, ?, NOW(), ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssi", $subject, $message, $client_id);

        if ($stmt->execute()) {
            // Successful insertion
            echo "Message sent successfully!";
        } else {
            // Error handling if the insertion fails
            echo "Error: " . $con->error;
        } 

        // Close the database connection
        $stmt->close();
    }
    $con->close();
} else {
    // Redirect or display an error if accessed directly without a POST request
    echo "Invalid request.";
}
?>
