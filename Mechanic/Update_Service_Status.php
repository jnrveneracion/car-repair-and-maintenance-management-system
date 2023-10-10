<?php
include('../connection.php');

if (isset($_POST['update_status'])) {
     $request_id = $_POST['request_id'];
     $new_status = $_POST['new_status'];

     // Update the service status in the service_cost table
     $update_sql = "UPDATE service_cost SET service_status_id = $new_status WHERE request_id = $request_id";
     $update_result = mysqli_query($con, $update_sql);

     if ($update_result) {
          // echo "Service status updated successfully.";
          echo '<script>window.location = "Job_Assignment.php";</script>';
     } else {
          echo "Error updating service status: " . mysqli_error($con);
     }

     mysqli_close($con);
}
?>