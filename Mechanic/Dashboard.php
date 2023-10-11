<?php
// require('../Admin/Admin_Connection.php');
require('../Connection.php');

// Function to execute SQL query and return the result as an associative array
function executeQuery($sql)
{
    global $con;
    $result = mysqli_query($con, $sql);
    if ($result) {
        return mysqli_fetch_assoc($result);
    } else {
        return false;
    }
}

$mechanic_id = $_SESSION['mechanic_id'];

// Get the total number of service costs with service_status_id = '1'
$sql = "SELECT COUNT(*) as total_service_costs FROM service_cost WHERE service_status_id = 1 AND mechanic_id = $mechanic_id";
$costData = executeQuery($sql);
$totalServiceCosts = $costData['total_service_costs'];

// 
$sql = "SELECT COUNT(*) as total_ongoing_job FROM service_cost WHERE service_status_id = 2 AND mechanic_id = $mechanic_id";
$OngoingJob = executeQuery($sql);
$totalOngoingJob = $OngoingJob['total_ongoing_job'];

$sql = "SELECT COUNT(*) as total_rejected_job FROM service_cost WHERE service_status_id = 3 AND mechanic_id = $mechanic_id";
$totalReject = executeQuery($sql);
$totalRejectedJob = $totalReject['total_rejected_job'];
// 

// Get the total number of service costs with service_status_id = '4'
$sql = "SELECT COUNT(*) as total_complete_job FROM service_cost WHERE service_status_id = 4 AND mechanic_id = $mechanic_id";
$completeJob = executeQuery($sql);
$totalCompleteJob = $completeJob['total_complete_job'];

// Get the total number of service costs with service_status_id = '4'
$sql = "SELECT COUNT(*) as total_job_assign FROM service_cost WHERE mechanic_id = $mechanic_id";
$totalJob = executeQuery($sql);
$totalJobAssign = $totalJob['total_job_assign'];
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
          <title>Mechanic | Dashboard</title>
          <style>
               .mechanic-section {
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

               .mechanic-head-txt {
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
          <?php include "../common/mechanic-side-nav.php" ?>
          <div>
               <div class="row">
                    <div class="col-xl-2 col-0"></div>
                    <div class="col-xl-10 col-12">
                         <div class="d-flex justify-content-center">
                              <h3 class="mechanic-head-txt mb-0">Dashboard Overview</h3>
                         </div>
                         <div class="d-flex justify-content-center">
                              <hr style="opacity: 1; color: white; width: 80%;">
                         </div>
                         <div class="d-flex justify-content-center">
                              <div class="mechanic-section">
                                   <div class="row" style="display: flex; justify-content: center;">
                                        <div class="col-lg-6 col-xl-4 col-12 sec">
                                             <div class="d-flex justify-content-center">
                                                  <div class="m-3">
                                                       <p class="sec-head">Pending Job Assignment</p>
                                                       <div class="d-flex justify-content-center">
                                                            <!-- <span class="tot"><?php //echo $_SESSION['mechanic_id']; ?></span> -->
                                                            <span class="tot"><?php echo $totalServiceCosts; ?></span>
                                                            <!-- dito mo ilagay yung echo ng php -->
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4 col-12 sec">
                                             <div class="d-flex justify-content-center">
                                                  <div class="m-3">
                                                       <p class="sec-head">Ongoing Job Assignment</p>
                                                       <div class="d-flex justify-content-center">
                                                       <span class="tot"><?php echo $totalOngoingJob; ?></span>
                                                            <!-- dito mo ilagay yung echo ng php -->
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4 col-12 sec">
                                             <div class="d-flex justify-content-center">
                                                  <div class="m-3">
                                                       <p class="sec-head">Complete Job Assignment</p>
                                                       <div class="d-flex justify-content-center">
                                                       <span class="tot"><?php echo $totalCompleteJob; ?></span>
                                                            <!-- dito mo ilagay yung echo ng php -->
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4 col-12 sec">
                                             <div class="d-flex justify-content-center">
                                                  <div class="m-3">
                                                       <p class="sec-head">Rejected Job Assignment</p>
                                                       <div class="d-flex justify-content-center">
                                                       <span class="tot"><?php echo $totalRejectedJob; ?></span>
                                                            <!-- dito mo ilagay yung echo ng php -->
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4 col-12 sec">
                                             <div class="d-flex justify-content-center">
                                                  <div class="m-3">
                                                       <p class="sec-head">Total Job Assignment</p>
                                                       <div class="d-flex justify-content-center">
                                                       <span class="tot"><?php echo $totalJobAssign; ?></span>
                                                            <!-- dito mo ilagay yung echo ng php -->
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
          <script>document.getElementById('dashboard').style = "border: 3px solid black;";</script>
     </body>
</html>