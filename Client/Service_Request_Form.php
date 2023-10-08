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

<head>
    <title>Service Request Form</title>
</head>
<body>
    <h1>Service Request Form</h1>
    <form method="POST" action="Serv_Req_Submit.php">
    <input type="hidden" name="client_id" value="<?php echo $client_id; ?>"> <!-- hidden input field -->
        <div class="mb-3">
            <label for="car_model" class="form-label">Car Model</label>
            <input type="text" class="form-control" id="car_model" name="car_model" required>
        </div>

        <div class="mb-3">
            <label for="car_brand" class="form-label">Car Brand</label>
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
            <label for="car_problem" class="form-label">Car Problem</label>
            <input type="text" class="form-control" id="car_problem" name="car_problem" required>
        </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
