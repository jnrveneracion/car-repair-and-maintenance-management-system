<?php
     include('../connection.php');
     
   $mechanic_id = $_SESSION['mechanic_id'];
     
   $query = "SELECT sc.request_id, cl.fullname, cl.mobile_number, cl.email,
                 sr.car_brand AS car_brands, sr.car_model AS car_models, sr.service_type AS serv_type
          FROM service_cost sc
          INNER JOIN service_request sr ON sc.request_id = sr.request_id
          INNER JOIN client cl ON sr.client_id = cl.client_id
          WHERE sc.mechanic_id = $mechanic_id AND sc.service_status_id = 4";
          
             

     $result = mysqli_query($con, $query);

     if (!$result) {
         die("Database query failed.");
     }
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
          <title>Mechanic | Job Assignment</title>

          <style>
               .table-section {
                    margin-top: 0px;
                    background-color: rgba(0, 0, 0, 0.29);
                    min-width: 200px;
                    overflow: scroll;
                    padding: 30px;
                    margin-right: 20px;
                    margin-left: 20px;
               }


               th, td {
                    text-align: center;
                    width: fit-content;
                    padding: 10px 15px;
                    
               }

               th {
                    background-color: black !important;
                    color: white !important;
                    font-weight: 400;
                    border: 1px solid white;
               }

               td {
                    background-color: rgb(12, 48, 71) !important;
                    color: white !important;
                    border: 1px solid white;
                    vertical-align: middle;
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


               .btn-a {
                    background-color: color(srgb 0.325 0.325 0.325);
                    border: none;
                    color: white !important;
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
                              <h3 class="mechanic-head-txt mb-0">Completed Job Assignment</h3>
                         </div>
                         <div class="d-flex justify-content-center">
                              <hr style="opacity: 1; color: white; width: 80%;">
                         </div>
                         <div class="d-flex justify-content-center">
                              <div class="table-section">

                                   <table>
                                        <thead>
                                             <tr>
                                                  <th scope="col">Request ID</th>
                                                  <th scope="col">Full Name</th>
                                                  <th scope="col">Mobile Number</th>
                                                  <th scope="col">Email</th>
                                                  <th scope="col">Car Brand</th>
                                                  <th scope="col">Car Model</th>
                                                  <th scope="col">Service Type</th>
                                                  <th scope="col">Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>{$row['request_id']}</td>";
                                    echo "<td>{$row['fullname']}</td>";
                                    echo "<td>{$row['mobile_number']}</td>";
                                    echo "<td>{$row['email']}</td>";
                                    echo "<td>{$row['car_brands']}</td>";
                                    echo "<td>{$row['car_models']}</td>";
                                    echo "<td>{$row['serv_type']}</td>";
                                    echo "<td><a href='View_Job_Assignment.php?request_id={$row['request_id']}' class='btn-a btn'>View</a></td>";
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
          <script>document.getElementById('complete-job').style = "border: 3px solid black;";</script>
     </body>
</html>