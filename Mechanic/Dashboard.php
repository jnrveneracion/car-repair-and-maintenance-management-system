<?php
     require ("../connection.php");
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
                    width: 800px;
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
                    background-color: color(srgb 0.9702 0.7395 0.3452);
                    padding: 26px 50px;
                    border-radius: 100%;
                    font-size: 50px;
                    color: white;
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
                                   <div class="row">
                                        <div class="col-lg-6 col-xl-4 col-12 sec">
                                             <div class="d-flex justify-content-center">
                                                  <div class="m-3">
                                                       <p class="sec-head">New Job Assignment</p>
                                                       <div class="d-flex justify-content-center">
                                                            <span class="tot">6</span>
                                                            <!-- dito mo ilagay yung echo ng php -->
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-4 col-12 sec">
                                             <div class="d-flex justify-content-center">
                                                  <div class="m-3">
                                                       <p class="sec-head">Finish Job Assignment</p>
                                                       <div class="d-flex justify-content-center">
                                                            <span class="tot">4</span>
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
                                                            <span class="tot">1</span>
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
     </body>
</html>