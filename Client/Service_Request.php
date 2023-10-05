<?php
    require('../connection.php');
?>

<head>
    <title>Service Request Form</title>
</head>
<body>
    <h1>Service Request Form</h1>
    <form method="POST" action="Serv_Req_Submit.php">
        <div class="mb-3">
            <label for="car_model" class="form-label">Car Model</label>
            <input type="text" class="form-control" id="car_model" name="car_model" required>
        </div>

        <div class="mb-3">
            <label for="car_brand" class="form-label">Car Brand</label>
            <input type="text" class="form-control" id="car_brand" name="car_brand" required>
        </div>

        <div class="mb-3">
            <label for="car_reg_num" class="form-label">Car Registered Number</label>
            <input type="text" class="form-control" id="car_reg_num" name="car_reg_num" required>
        </div>

        <div class="mb-3">
            <label for="service_type" class="form-label">Service Type</label>
            <input type="text" class="form-control" id="service_type" name="service_type" required>
        </div>

        <div class="mb-3">
            <label for="car_problem" class="form-label">Car Problem</label>
            <input type="text" class="form-control" id="car_problem" name="car_problem" required>
        </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>