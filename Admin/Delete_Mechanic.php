<?php
require('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["mechanic_id"])) {
    $mechanic_id = $_GET["mechanic_id"];
    
    // Create a DELETE SQL query to delete the record with the specified mechanic_id
    $sql = "DELETE FROM mechanic WHERE mechanic_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $mechanic_id);
    
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to Mechanic.php after successful deletion
        header("Location: Mechanic.php");
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
