
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <title>Services</title>
     <link rel="stylesheet" href="CSS/bg-style-a.css">
     <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
     <?php include "common/navbar.php" ?>

     <div>
          <div class="head-section">
               <p class="m-0">Our Services</p>
               <p style="font-size: 20px; font-weight: 200; margin: 0px;">Explore Our Services</p>
          </div>
          <div class="row m-2 p-3">
               <?php
               // Include the database connection file
               require("Admin/Admin_Connection.php");

               // Query to retrieve service offers
               $query = "SELECT * FROM services_offer";

               // Execute the query
               $result = mysqli_query($con, $query);

               // Check if the query was successful
               if ($result) {
                   // Fetch and display service offers
                   while ($row = mysqli_fetch_assoc($result)) {
                       echo '<div class="col-xl-4 col-lg-6 col-12">';
                       echo '<div>';
                       echo '<div class="m-4 box-section d-flex justify-content-center align-items-center">';
                       echo '<div class="">';
                       echo '<p>' . $row['type'] . '</p>';
                       echo '<p class="fw-lighter">' . $row['description'] . '</p>';
                       echo '</div>';
                       echo '</div>';
                       echo '</div>';
                       echo '</div>';
                   }

                   // Free the result set
                   mysqli_free_result($result);
               } else {
                   echo 'Error: ' . mysqli_error($con);
               }

               // Close the database connection
               mysqli_close($con);
               ?>
          </div>
     </div>

     <?php include "common/footer.php"?>

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>