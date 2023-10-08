<?php

  require('../connection.php');
    
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

  // Retrieve the client_id from the session
  $client_id = $_SESSION['client_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
    </style>
</head>
<body>
    <?php include "../common/navbar-for-folder.php" ?>

    <div class="d-flex justify-content-center">
          <div class="request-form-section">
               <div>
                    <p style="color: white; text-align: center; font-weight: 600; letter-spacing: 2px;">SERVICE REQUEST FORM</p>
                    <hr style="color: white; opacity: 1;">
               </div>
                    <div>
                         <form class="row" method="POST" action="Serv_Req_Submit.php">
                              <div class="col-12">
                                   <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
                                   <!-- <div class="mb-3 d-grid">
                                        <label for="ownerName" class="service-label" id="name">Owner Name:</label>
                                        <input type="text" aria-label="Owner Name" id="ownerName" name="ownerName">
                                   </div> -->
                                   <div class="mb-3 d-grid">
                                        <label for="car_brand" class="service-label" id="name">Car Brand:</label>
                                        <input type="text" aria-label="Car Brand" id="car_brand" name="car_brand" required>
                                   </div>
                                   <div class="mb-3 d-grid">
                                        <label for="service_type" class="service-label" id="name">Service Type:</label>
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
                                   <div class="mb-3 d-grid">
                                        <label for="car_model" class="service-label" id="name">Car Model:</label>
                                        <input type="text" aria-label="Car Model" id="car_model" name="car_model">
                                   </div>
                                   <div class="mb-3 d-grid">
                                        <label for="car_reg_num" class="service-label" id="name">Car Registration No.:</label>
                                        <input type="text" aria-label="Car Registration No." id="car_reg_num" name="car_reg_num">
                                   </div>
                                   <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn submit-service-btn">Submit</button>
                                   </div>
                              </div>
                         </form>
                    </div>
               <div>

               </div>
          </div>
    </div>

    <?php include "../common/footer-for-folder.php" ?>
    <script src="../js/input-only-number.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>





