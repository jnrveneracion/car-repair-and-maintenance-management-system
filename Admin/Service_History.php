<!-- Dito mapupunta kapag naapprove ung service request para malagay ung cost and stuff .  -->

<?php
include('../connection.php');

// SQL query to join the client and service_request tables
$query = "SELECT sr.request_id, c.fullname, sr.car_model, sr.service_type, sr.request_status
          FROM service_request sr
          INNER JOIN client c ON sr.client_id = c.client_id";

$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

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
     <title>Admin | Pending Service</title>
     <style>
          .admin-section {
               margin-top: 0px;
               margin-bottom: 100px;
               background-color: rgba(0, 0, 0, 0.29);
               min-width: 200px;
               overflow: scroll;
               padding: 30px;
               margin-right: 20px;
               margin-left: 20px;
               width: 1000px;
          }

          .table-section {
               margin-top: 0px;
               min-width: 200px;
               overflow: scroll;
          }


          th,
          td {
               text-align: center;
               width: fit-content;
               padding: 10px 15px;
          }

          th {
               background-color: transparent !important;
               color: white !important;
               font-weight: 400;
               border: 1px solid white;
               font-weight: bold;
          }

          td {
               background-color: transparent !important;
               color: white !important;
               border: 1px solid white;
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

          .btn-a,
          .btn-edit,
          .btn-delete {
               border-radius: 0px;
               color: white;
               margin: 5px !important;
               text-decoration: none;
               padding: 10px 20px;
          }

          .btn-edit {
               font-size: 12px;
               padding: 5px 10px !important;
          }

          .btn-a:hover,
          .btn-edit:hover,
          .btn-delete:hover {
               filter: brightness(.9);
          }


          .btn-a,
          .btn-edit {
               background-color: color(srgb 0.2706 0.7121 0.9729);
          }

          .btn-a:hover,
          .btn-edit:hover {
               filter: brightness(.9);
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
                         <h3 class="admin-head-txt mb-0">Service History</h3>
                    </div>
                    <div class="d-flex justify-content-center">
                         <hr style="opacity: 1; color: white; width: 80%;">
                    </div>
                    <div class="d-flex justify-content-center">
                         <div class="admin-section">
                              <div class="table-section">


                                   <table class="table">
                                        <thead>
                                             <tr>
                                                  <th scope="col">Request ID</th>
                                                  <th scope="col">Full Name</th>
                                                  <th scope="col">Vehicle Model</th>
                                                  <th scope="col">Service Type</th>
                                                  <th scope="col">Request Status</th>
                                                  <th scope="col">Action</th>
                                             </tr>

                                        </thead>
                                        <tbody>
                                         <?php
                                        // Step 4: Loop through the fetched data and display it in the HTML table.
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['request_id'] . "</td>";
                                            echo "<td>" . $row['fullname'] . "</td>";
                                            echo "<td>" . $row['car_model'] . "</td>";
                                            echo "<td>" . $row['service_type'] . "</td>";
                                            if ($row['request_status'] == 1) {
                                             echo "<td>Approved</td>";
                                         } else {
                                             echo "<td>Pending</td>";
                                         }
                                            echo '<td><a href="Admin_View_Service_History.php?request_id=' . $row['request_id'] . '" class="btn-edit">View</a></td>';
                                            echo "</tr>";
                                        }
                                        ?>
            </tbody>
                                   </table>





                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <script>document.getElementById('service-history-nav').style = "border: 3px solid black !important;";</script>
</html>