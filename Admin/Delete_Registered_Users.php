<?php
require('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["client_id"])) {
    $client_id = $_GET["client_id"];
    
    // Create a DELETE SQL query to delete the record with the specified client_id
    $sql = "DELETE FROM client WHERE client_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $client_id);
    
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to Registered_Users.php after successful deletion
        header("Location: Registered_Users.php");
        exit(); // Make sure to exit to prevent further script execution
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    echo "Invalid request.";
}
?>
