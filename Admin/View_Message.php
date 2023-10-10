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
     ?>

     <!DOCTYPE html>
     <html lang="en">

     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
               integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
          <link rel="stylesheet" href="../CSS/style.css">
          <link rel="stylesheet" href="../CSS/bg-style-a.css">
          <title>Admin | Service Offer</title>
          <style>
               .admin-section {
                    margin-top: 0px;
                    margin-bottom: 100px;
                    background-color: rgba(236, 250, 254, 1);
                    min-width: 200px;
                    overflow: scroll;
                    padding: 30px;
                    margin-right: 20px;
                    margin-left: 20px;
                    width: 850px;
               }

               .table-section {
                    margin-top: 0px;
                    min-width: 200px;
                    overflow: scroll;
                    padding: 30px 0px;
               }


               th,
               td {
                    text-align: start;
                    width: fit-content;
                    padding: 10px 15px;
               }

               th {
                    background-color: transparent !important;
                    color: black !important;
                    font-weight: 400;
                    border: 1px solid black;
                    font-weight: bolder;
               }

               td {
                    background-color: transparent !important;
                    color: black !important;
                    border: 1px solid black;
                    vertical-align: middle;
               }

               .admin-head-txt {
                    margin: 20px;
                    color: white;
                    margin-top: 50px;
                    text-transform: uppercase;
                    padding: 10px 35px;
                    background-color: color(srgb 0.9702 0.7395 0.3452);
                    width: fit-content;
               }

               .sec-head {
                    background-color: color(srgb 0.1294 0.2682 0.2997);
                    color: white;
                    padding: 10px;
                    width: fit-content;
               }

               .btn-a.buttons {
                    background-color: color(srgb 0.2706 0.7121 0.9729);
               }

               .btn-b.buttons {
                    background-color: red;
                    text-decoration: none;
                    color: black;
                    padding: 8px 20px;
                    margin: 0px 10px;
               }

               .buttons {
                    padding: 5px 20px;
                    border: 1px solid black !important;
               }

               .buttons:hover {
                    filter: brightness(.9)
               }

               input {
                    border: none !important;
                    background-color: transparent !important;
               }
          </style>
     </head>

     <body>
          <?php include "../common/admin-side-nav.php" ?>
          <div>
               <div class="row">
                    <div class="col-xl-2 col-0"></div>
                    <div class="col-xl-10 col-12">
                         <div class="d-flex justify-content-center">
                              <h3 class="admin-head-txt mb-0">Message</h3>
                         </div>
                         <div class="d-flex justify-content-center">
                              <hr style="opacity: 1; color: white; width: 80%;">
                         </div>
                         <div class="d-flex justify-content-center">
                              <div class="admin-section">
                                   <div>
                                        <p>Response to Message</p>
                                        <hr style="color: black; opacity: 1; padding: 3px;">
                                        <?php
                                        if (!$result) {
                                             die("SQL query failed: " . mysqli_error($con));
                                        }

                                        // Check if a message with the specified message_id exists
                                        if (mysqli_num_rows($result) > 0) {
                                             $row = mysqli_fetch_assoc($result);
                                             echo '<table class="table">';
                                             echo '<tbody>';

                                             // echo '<tr>';
                                             // echo '<th scope="row">Message ID</th>';
                                             // echo '<td>' . $row['message_id'] . '</td>';
                                             // echo '</tr>';
                                   
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
                                             echo '<table class="table">';
                                             echo '<tbody>';
                                             echo '<tr>';
                                             echo '<th scope="row"><label for="admin_response" class="form-label">Admin Response</label></th>';
                                             echo '<td><input type="text" placeholder="Enter your Message" class="form-control" id="admin_response" name="admin_response" required';

                                             // Check if admin_response has a value in the database
                                             if (!empty($row['admin_response'])) {
                                                  echo ' value="' . htmlspecialchars($row['admin_response']) . '"';
                                             }

                                             echo '></td>';
                                             echo '</tr>';
                                             echo '</tbody>';
                                             echo '</table>';

                                             echo '<div style="float: right;">';
                                             echo '<button type="submit" class="btn-a buttons">Submit</button>';
                                             echo '<a href="Message.php" class="btn-b buttons">Cancel</a>';
                                             echo '</div>';
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
                    // echo 'Response successfully sent.';
                    echo '<script>window.location = "Message.php";</script>';
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


                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <script>document.getElementById('message-nav').style = "border: 3px solid black;";</script>
</body>

</html>