<!-- Dito makikita ung ongoing jobs. maglagay status? -->

<?php
    include('../connection.php');
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

               .mechanic-head-txt {
                    margin: 20px;
                    color: white;
                    margin-top: 50px;
                    text-transform: uppercase;
                    padding: 10px 15px;
                    background-color: color(srgb 0.0472 0.1883 0.2773);
                    width: fit-content;
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
                              <h3 class="mechanic-head-txt mb-0">Ongoing Job Assignment</h3>
                         </div>
                         <div class="d-flex justify-content-center">
                              <hr style="opacity: 1; color: white; width: 80%;">
                         </div>
                         <div class="d-flex justify-content-center">
                              <div class="table-section">
                                   <table class="table">
                                   <thead>
                                        <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Owner Name</th>
                                             <th scope="col">Contact No</th>
                                             <th scope="col">Car Brand</th>
                                             <th scope="col">Service Type</th>
                                             <th scope="col">Date</th>
                                             <th scope="col">Service Status</th>

                                             <!-- dapat may view function Dito -->
                                        </tr>
                                   </thead>
                                   <tbody>
                                   </tbody>
                                   </table>
                              </div>
                         </div>
                         
                    </div>

               </div>
          </div>
     </body>
</html>