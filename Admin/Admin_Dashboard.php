<?php
require('Admin_Connection.php');

// Function to execute SQL query and return the result as an associative array
function executeQuery($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

// Get the total number of registered users
$sql = "SELECT COUNT(*) as total_users FROM client";
$userData = executeQuery($sql);
$totalUsers = $userData['total_users'];

// Get the total number of mechanics
$sql = "SELECT COUNT(*) as total_mechanics FROM mechanic";
$mechanicData = executeQuery($sql);
$totalMechanics = $mechanicData['total_mechanics'];

// Get the total number of service requests
$sql = "SELECT COUNT(*) as total_service_requests FROM service_request";
$requestData = executeQuery($sql);
$totalServiceRequests = $requestData['total_service_requests'];

// Get the total number of messages
$sql = "SELECT COUNT(*) as total_messages FROM message";
$messageData = executeQuery($sql);
$totalMessages = $messageData['total_messages'];

// Get the total number of service requests with request_status = 0
$sql = "SELECT COUNT(*) as total_open_service_requests FROM service_request WHERE request_status = 0";
$requestData = executeQuery($sql);
$totalOpenServiceRequests = $requestData['total_open_service_requests'];

// Get the total number of service costs with service_status_id = '4'
$sql = "SELECT COUNT(*) as total_service_costs FROM service_cost WHERE service_status_id = 4";
$costData = executeQuery($sql);
$totalServiceCosts = $costData['total_service_costs'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
          crossorigin="anonymous">
     <link rel="stylesheet" href="../CSS/style.css">
     <link rel="stylesheet" href="../CSS/bg-style-a.css">
     <title>Admin | Dashboard</title>
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
                    width: 850px;
               }

               .admin-head-txt {
                    margin: 20px;
                    color: white;
                    margin-top: 50px;
                    text-transform: uppercase;
                    padding: 10px 15px;
                    background-color: color(srgb 0.0472 0.1883 0.2773);
                    width: fit-content;
               }

               .sec-head {
                    background-color: color(srgb 0.1294 0.2682 0.2997);
                    color: white;
                    padding: 10px;
                    width: fit-content;
               }

               .tot {
                    background-image: url('../Assets/circle.png');
                    border-radius: 100%;
                    font-size: 45px;
                    color: white;
                    background-size: cover;
                    background-repeat: no-repeat;
                    width: 100px;
                    height: 100px;
                    text-align: center;
                    padding: 12px 0px;
               }
          </style>
</head>
<body>
     <?php include "../common/admin-side-nav.php"?>
     <div>
          <div class="row">
               <div class="col-xl-2 col-0"></div>
               <div class="col-xl-10 col-12">
                    <div class="d-flex justify-content-center">
                         <h3 class="admin-head-txt mb-0">Dashboard Overview</h3>
                    </div>
                    <div class="d-flex justify-content-center">
                         <hr style="opacity: 1; color: white; width: 80%;">
                    </div>
                    <div class="d-flex justify-content-center">
                         <div class="admin-section">
                              <div class="row">
                                   <div class="col-md-6 col-xl-4 col-12 sec">
                                        <div class="d-flex justify-content-center">
                                             <div class="m-3">
                                                  <p class="sec-head">Total Registered User</p>
                                                  <div class="d-flex justify-content-center">
                                                  <span class="tot"><?php echo $totalUsers; ?></span>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-md-6 col-xl-4 col-12 sec">
                                        <div class="d-flex justify-content-center">
                                             <div class="m-3">
                                                  <p class="sec-head">Total Mechanics</p>
                                                  <div class="d-flex justify-content-center">
                                                  <span class="tot"><?php echo $totalMechanics; ?></span>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-md-6 col-xl-4 col-12 sec">
                                        <div class="d-flex justify-content-center">
                                             <div class="m-3">
                                                  <p class="sec-head">Total Service Request</p>
                                                  <div class="d-flex justify-content-center">
                                                  <span class="tot"><?php echo $totalServiceRequests; ?></span>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-md-6 col-xl-4 col-12 sec">
                                        <div class="d-flex justify-content-center">
                                             <div class="m-3">
                                                  <p class="sec-head">Total Message</p>
                                                  <div class="d-flex justify-content-center">
                                                       <span class="tot"><?php echo $totalMessages; ?></span>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-md-6 col-xl-4 col-12 sec">
                                        <div class="d-flex justify-content-center">
                                             <div class="m-3">
                                                  <p class="sec-head">Total New Service Request</p>
                                                  <div class="d-flex justify-content-center">
                                                       <span class="tot"><?php echo $totalOpenServiceRequests; ?></span>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-md-6 col-xl-4 col-12 sec">
                                        <div class="d-flex justify-content-center">
                                             <div class="m-3">
                                                  <p class="sec-head">Finished Services</p>
                                                  <div class="d-flex justify-content-center">
                                 
                                                       <span class="tot"><?php echo $totalServiceCosts; ?></span>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</body>
</html>