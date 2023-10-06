<?php
require('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["service_id"])) {
    $service_id = $_GET["service_id"];
    
    // Create a DELETE SQL query to delete the record with the specified service_id
    $sql = "DELETE FROM services_offer WHERE service_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $service_id);
    
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to Service_Offer.php after successful deletion
        header("Location: Service_Offer.php");
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
