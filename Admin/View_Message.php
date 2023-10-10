<?php
include('../connection.php');

// Check if the message_id is set in the URL
if (isset($_GET['message_id'])) {
    $message_id = $_GET['message_id'];

    // Query to retrieve the specific message and client details
    $sql = "SELECT
                message.message_id,
                client.fullname AS client_name,
                client.email AS client_email,
                message.subject,
                message.date,
                message.message,
                message.admin_response
            FROM
                message
            JOIN
                client ON message.client_id = client.client_id
            WHERE
                message.message_id = $message_id";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("SQL query failed: " . mysqli_error($con));
    }

    // Check if a message with the specified message_id exists
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        echo '<h2>View Client Message</h2>';
        echo '<h3>Client Message</h3>';

        echo '<table class="table">';
        echo '<tbody>';

        echo '<tr>';
        echo '<th scope="row">Message ID</th>';
        echo '<td>' . $row['message_id'] . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Full Name</th>';
        echo '<td>' . $row['client_name'] . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Email</th>';
        echo '<td>' . $row['client_email'] . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Subject</th>';
        echo '<td>' . $row['subject'] . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Message Date</th>';
        echo '<td>' . $row['date'] . '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Message</th>';
        echo '<td>' . $row['message'] . '</td>';
        echo '</tr>';

        echo '</tbody>';
        echo '</table>';

        // The Admin Form is here
        echo '<form method="POST" action="">';

        echo '<div class="mb-3">';
        echo '<label for="admin_response" class="form-label">Admin Response</label>';
        echo '<input type="text" class="form-control" id="admin_response" name="admin_response" required>';
        echo '</div>';

        echo '<button type="submit" class="btn btn-primary">Submit</button>';

        echo '</form>';
        // Forms end here
    } else {
        echo 'Message not found.';
    }
} else {
    echo 'Message ID not provided.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the admin_response field is set in the POST data
    if (isset($_POST['admin_response'])) {
        // Get the admin response from the form
        $adminResponse = $_POST['admin_response'];

        // Update the message table with the admin response
        $updateSql = "UPDATE message SET admin_response = ? WHERE message_id = ?";
        $stmt = mysqli_prepare($con, $updateSql);

        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, 'si', $adminResponse, $message_id);

            // Execute the update query
            if (mysqli_stmt_execute($stmt)) {
                echo 'Admin response saved successfully.';
            } else {
                echo 'Error updating admin response: ' . mysqli_error($con);
            }

            // Close the prepared statement
            mysqli_stmt_close($stmt);
        } else {
            echo 'Error preparing update statement: ' . mysqli_error($con);
        }
    } else {
        echo 'Admin response not provided.';
    }
}

mysqli_close($con);
?>
