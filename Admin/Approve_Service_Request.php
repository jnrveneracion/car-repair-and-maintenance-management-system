<?php
include('../connection.php');

// Check if the request_id parameter is set in the URL
if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];

    // Update the status to '1' for the specified request ID
    $sql = "UPDATE service_request SET request_status = '1' WHERE request_id = $request_id";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    } else {
        // Redirect back to the view page or display a success message
        header("Location: Service_Request.php?request_id=$request_id");
        exit();
    }
} else {
    echo "Request ID not specified.";
}

mysqli_close($con);
?>
