<?php
// Start the session
require('../connection.php');
?>

<?php
// Check if the client is logged in and retrieve the client_id from the session
if (isset($_SESSION['client_id'])) {
    $client_id = $_SESSION['client_id'];
} else {
    // Redirect the user to the login page or handle the case where the user is not logged in
    header("Location: Login.php");
    exit();
}



// Check if the client_id is set in the session
if (!isset($_SESSION['client_id'])) {
    // Handle the case when client_id is not set, such as redirecting to a login page
    header("Location: login.php");
    exit;
}

// Retrieve service types from the services_offer table
$sql = "SELECT DISTINCT type FROM services_offer";
$result = mysqli_query($con, $sql);

// Check if there are any service types
$serviceTypes = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $serviceTypes[] = $row['type'];
    }
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
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
          <link rel="stylesheet" href="../CSS/style.css">
          <link rel="stylesheet" href="../CSS/bg-style-a.css">
          <title>Service Request</title>
          <style>
               .request-form-section {
                    background-color: rgba(0, 0, 0, 0.29);
                    width: 700px;
                    margin: 40px 20px;
                    padding: 20px;
               }

               #name {
                    color: white;
                    margin: 5px 0px;
                    font-size: 13px;
               }

               .btn.submit-service-btn {
                    background-color: color(srgb 0.2673 0.5931 0.2537);
                    color: white;
                    border-radius: 15px;
                    width: 105px;
                    margin: 0 auto;
               }

               label {
                    color: white;
               }
          </style>
     </head>

     <body>
       


          <?php 
               include "../common/navbar-for-folder.php" 
          ?> 



          <div class="d-flex justify-content-center">
               <div class="request-form-section">
                    <div>
                         <p style="color: white; text-align: center; font-weight: 600; letter-spacing: 2px;">SERVICE
                              REQUEST FORM</p>
                         <hr style="color: white; opacity: 1;">
                    </div>
                    <div>
                         <form method="POST" action="Serv_Req_Submit.php">
                              <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
                              <input type="hidden" name="status" value="0">
                              <!-- hidden input field -->
                              <div class="mb-3">
                                   <label for="car_model" class="form-label">Vehicle Model</label>
                                   <input type="text" class="form-control" id="car_model" name="car_model" required>
                              </div>

                              <div class="mb-3">
                                   <label for="car_brand" class="form-label">Vehicle Brand</label>
                                   <input type="text" class="form-control" id="car_brand" name="car_brand" required>
                              </div>

                              <div class="mb-3">
                                   <label for="car_reg_num" class="form-label">Registration Number</label>
                                   <input type="text" class="form-control" id="car_reg_num" name="car_reg_num" required>
                              </div>

                              <div class="mb-3">
                                   <label for="service_type" class="form-label">Service Type</label>
                                   <select class="form-select" id="service_type" name="service_type" required>
                                        <option value="" disabled selected>Select Service Type</option>
                                        <?php
                                        // Populate the dropdown list with service types
                                        foreach ($serviceTypes as $type) {
                                             echo "<option value='$type'>$type</option>";
                                        }
                                        ?>
                                   </select>
                              </div>

                              <div class="mb-3">
                                   <label for="car_problem" class="form-label">Vehicle Problem</label>
                                   <input type="text" class="form-control" id="car_problem" name="car_problem" required>
                              </div>

                              <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
                    </div>
                    <div>

                    </div>
               </div>
          </div>

          <?php include "../common/footer-for-folder.php" ?>
          <script src="../js/input-only-number.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
               integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
               crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
               integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
               crossorigin="anonymous"></script>
     </body>
</html>