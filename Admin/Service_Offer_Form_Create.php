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
          <title>Admin | Create Service Offer</title>
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
                    text-align: center;
                    width: fit-content;
                    padding: 10px 15px;
               }

               th {
                    background-color: transparent !important;
                    color: white !important;
                    font-weight: 400;
                    border: 1px solid white;
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

               .btn-a.buttons {
                    background-color: color(srgb 0.2706 0.7121 0.9729);
               }

               .btn-b.buttons {
                    background-color: red;
                    text-decoration: none;
                    color: black;
                    padding: 8px 20px;
               }

               .buttons {
                    padding: 5px 20px;
                    border: 1px solid black !important;
               }

               .button:hover {
                    filter: brightness(.9);
               }

               input, textarea, select {
                    border: 1px solid black !important;
                    border-radius: 0px !important;
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
                              <h3 class="admin-head-txt mb-0">Create Service</h3>
                         </div>
                         <div class="d-flex justify-content-center">
                              <hr style="opacity: 1; color: white; width: 80%;">
                         </div>
                         <div class="d-flex justify-content-center">
                              <div class="admin-section">
                                   <div>
                                        <form method="POST" action="Manage_Service_Offer.php">
                                             <?php
                                                  // Check if a service_id is provided in the URL
                                                  if (isset($_GET['service_id'])) {
                                                       $service_id = $_GET['service_id'];
                                                       // Fetch the existing service offer details based on service_id and populate the form fields for editing
                                                       include('../connection.php');
                                                       $sql = "SELECT * FROM services_offer WHERE service_id = ?";
                                                       $stmt = mysqli_prepare($con, $sql);
                                                       mysqli_stmt_bind_param($stmt, "i", $service_id);
                                                       mysqli_stmt_execute($stmt);
                                                       $result = mysqli_stmt_get_result($stmt);
                                                       $row = mysqli_fetch_assoc($result);
                                                       mysqli_close($con);
                                                  }
                                             ?>

                                             <div class="mb-3">
                                                  <label for="service_type" class="form-label">Service Type</label>
                                                  <input type="text" class="form-control" id="service_type" name="service_type" required
                                                       value="<?php echo isset($row['type']) ? $row['type'] : ''; ?>">
                                             </div>

                                             <!-- <div class="mb-3">
                                                  <label for="service_name" class="form-label">Service Name</label>
                                                  <input type="text" class="form-control" id="service_name" name="service_name" required value="<?php echo isset($row['service_name']) ? $row['service_name'] : ''; ?>">
                                             </div> -->

                                             <div class="mb-3">
                                                  <label for="description" class="form-label">Description</label>
                                                  <textarea style="height: 100px;" type="text" class="form-control" id="description" name="description" required
                                                       value="<?php echo isset($row['description']) ? $row['description'] : ''; ?>"> <?php echo isset($row['description']) ? $row['description'] : ''; ?></textarea>
                                             </div>

                                             <div class="mb-3">
                                                  <label for="status" class="form-label">Status</label>
                                                  <select class="form-select" id="status" name="status" required>
                                                       <option value="Active" <?php echo isset($row['status']) && $row['status'] === 'Active' ? 'selected' : ''; ?>>Active</option>
                                                       <option value="Inactive" <?php echo isset($row['status']) && $row['status'] === 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
                                                  </select>
                                             </div>



                                             <?php
                                             // If in edit mode, include a hidden input field to pass the service_id to Manage_Service_Offer.php
                                             if (isset($service_id)) {
                                                  echo '<input type="hidden" name="edit_mode" value="true">';
                                                  echo '<input type="hidden" name="service_id" value="' . $service_id . '">';
                                             }
                                             ?>

                                             <button type="submit" class="btn-a buttons">
                                                  <?php echo isset($service_id) ? 'Save' : 'Save'; ?>
                                             </button>
                                             <a href="Service_Offer.php" class="btn-b buttons">Cancel</a>
                                        </form>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </body>
</html>