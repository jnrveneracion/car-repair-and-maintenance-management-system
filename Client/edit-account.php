<?php
include('../connection.php');


// Get the client_id from the session
if (isset($_SESSION['client_id'])) {
    $client_id = $_SESSION['client_id'];

    $sql = "SELECT fullname, email, mobile_number, address, username FROM client WHERE client_id = $client_id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        // Extract data from the row
        $fullname = $row['fullname'];
        $email = $row['email'];
        $mobile_number = $row['mobile_number'];
        $address = $row['address'];
        $username = $row['username'];
    } else {
        // Handle database query error
        echo "Error: " . mysqli_error($con);
    }
}

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
    <title>My Service History</title>
    <style>
        .head-section-txt {
            width: fit-content;
            float: right;
            background-color: color(srgb 0.9702 0.7395 0.3452);
            padding: 10px 20px;
            font-weight: 500;
        }


        .btn-a {
          background-color: color(srgb 0.2706 0.7121 0.9729) !important;
          border: none;
          color: white !important;
          border-radius: 0px;
          margin: 0px 10px;
        }

        .btn-a:hover {
          filter: brightness(.9);
        }

        .mb-3 {
          display: flex;
        }

        .table-section {
          min-width: 200px;
          overflow: scroll;
          width: 600px;
          background-color: rgba(0, 0, 0, 0.24);
          padding: 20px;
          display: flex;
          justify-content: center;
        }

        .form-label {
               width: 35%;
               padding: 12px;
               background-color: color(srgb 0.9702 0.7395 0.3452);
               margin: 10px;
          }

          .registration-input {
               margin: 12px 0px;
               border-radius: 0px;
               width: 65%;
               padding: 10px;
          }
    </style>
</head>
<body>
    <?php include "../common/navbar-for-folder.php" ?>

    <div class="f-height d-flex justify-content-center" style="margin-bottom: 50px;">
          <div class="text-white section" style="min-height: 445px;">
               <div>
                    <div>
                        <div class="head-section-txt">MY ACCOUNT</div>
                    </div>
                    <div style="width: 100%;" class="d-flex justify-content-center">
                        <div class="table-section">
                              <div class="w-100">
                              <form method="POST" action="update-account.php">
                                   <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
                                   <div class="mb-3">
                                   <label for="fullname" class="form-label">Full Name:</label>
                                   <input type="text" class="registration-input form-control" id="fullname" name="fullname"
                                        required value="<?php echo $fullname; ?>">
                                   </div>
                                   <div class="mb-3">
                                   <label for="email" class="form-label">Email address:</label>
                                   <input type="email" class="registration-input form-control" id="email" name="email" required
                                        value="<?php echo $email; ?>">
                                   </div>
                                   <div class="mb-3">
                                   <label for="mobile_number" class="form-label">Mobile Number:</label>
                                   <input type="text" class="registration-input form-control input-number-only" id="mobile_number"
                                        name="mobile_number" required value="<?php echo $mobile_number; ?>">
                                   </div>
                                   <div class="mb-3">
                                   <label for="address" class="form-label">Address:</label>
                                   <input type="text" class="registration-input form-control" id="address" name="address" required
                                        value="<?php echo $address; ?>">
                                   </div>
                                   <div class="mb-3">
                                   <label for="username" class="form-label">Username:</label>
                                   <input type="text" class="registration-input form-control" id="username" name="username"
                                        required value="<?php echo $username; ?>">
                                   </div>

                                   <button type="submit" class="btn btn-a">Update</button>
                                   <a href="my-account.php" class="btn btn-a" style="background-color: red !important;">Cancel</a>
                              </form>
                              
                              </div>
                        </div>
                    </div>
                    
               </div>
          </div>
     </div>
    

    <?php include "../common/footer-for-folder.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>



