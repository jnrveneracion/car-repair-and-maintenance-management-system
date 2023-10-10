<?php
include('../connection.php');

$mechanic_id = isset($_GET['mechanic_id']) ? $_GET['mechanic_id'] : null;

if ($mechanic_id) {
    $sql = "SELECT * FROM mechanic WHERE mechanic_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $mechanic_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Populate form fields with existing data
        $fullname = $row['fullname'];
        $skill = $row['skill'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];
        $address = $row['address'];
    }
    mysqli_stmt_close($stmt);
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

               .buttons:hover {
                    filter: brightness(.9)
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
                              <h3 class="admin-head-txt mb-0" id="admin-head-txt"><?php echo isset($row['fullname']) ? 'Update Mechanic' : 'Add Mechanic'; ?></h3>   
                         </div>
                         <div class="d-flex justify-content-center">
                              <hr style="opacity: 1; color: white; width: 80%;">
                         </div>
                         <div class="d-flex justify-content-center">
                              <div class="admin-section">
                                   <div>
                                   <form method="POST" action="Manage_Mechanic.php" >
                                        <div class="row">
                                             <div class="mb-3 col-lg-6 col-12">
                                                  <label for="fullname" class="form-label">Mechanic Full Name</label>
                                                  <input type="text" class="form-control" id="fullname" name="fullname" required value="<?php echo isset($row['fullname']) ? $row['fullname'] : ''; ?>">
                                             </div>

                                             <div class="mb-3 col-lg-6 col-12">
                                                  <label for="skill" class="form-label">Skill</label>
                                                  <input type="text" class="form-control" id="skill" name="skill" required value="<?php echo isset($row['skill']) ? $row['skill'] : ''; ?>">
                                             </div>

                                             <div class="mb-3 col-lg-6 col-12">
                                                  <label for="address" class="form-label">Address</label>
                                                  <input type="text" class="form-control" id="address" name="address" required value="<?php echo isset($row['address']) ? $row['address'] : ''; ?>">
                                             </div>

                                             <div class="mb-3 col-lg-6 col-12">
                                                  <label for="mobile_number" class="form-label">Mobile Number</label>
                                                  <input type="text" class="form-control" id="mobile_number" name="mobile_number" required value="<?php echo isset($row['mobile_number']) ? $row['mobile_number'] : ''; ?>">
                                             </div>

                                             <div class="mb-3 col-lg-6 col-12">
                                                  <label for="username" class="form-label">Username</label>
                                                  <input type="text" class="form-control" id="username" name="username" required value="<?php echo isset($row['username']) ? $row['username'] : ''; ?>">
                                             </div>

                                             
                                             <div class="mb-3 col-lg-6 col-12">
                                                  <label for="email" class="form-label">Email</label>
                                                  <input type="text" class="form-control" id="email" name="email" required value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>">
                                             </div>

                                             <div class="mb-3 col-lg-6 col-12">
                                                  <label for="password" class="form-label">Password</label>
                                                  <input type="password" class="form-control" id="password" name="password" required value="<?php echo isset($row['password']) ? $row['password'] : ''; ?>">
                                             </div>
                                        </div>
                                        <?php
                                        // If in edit mode, include a hidden input field to pass the service_id to Manage_Service_Offer.php
                                        if (isset($mechanic_id)) {
                                             echo '<input type="hidden" name="edit_mode" value="true">';
                                             echo '<input type="hidden" name="mechanic_id" value="' . $mechanic_id . '">';
                                        }
                                        ?>

                                        <!-- <button type="submit" class="btn btn-primary"><?php echo isset($mechanic_id) ? : 'Submit'; ?></button> -->
                                        <!-- <button type="submit" class="btn btn-primary">   <?php echo isset($mechanic_id) ? 'Save' : 'Save'; ?>   </button> -->
                                        <button type="submit" class="btn-a buttons"><?php echo isset($mechanic_id) ? 'Save' : 'Submit'; ?></button>
                                        <a href="Mechanic.php" class="btn-b buttons">Cancel</a>
                                   </form>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <script>document.getElementById('mechanics-nav').style = "border: 3px solid black;";</script>
     </body>
</html>