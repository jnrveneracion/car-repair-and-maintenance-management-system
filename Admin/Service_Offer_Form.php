<head>
    <title>Service Offer</title>
</head>

<body>
    <h1>Service Offer</h1>
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
            <input type="text" class="form-control" id="description" name="description" required
                value="<?php echo isset($row['description']) ? $row['description'] : ''; ?>">
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

        <button type="submit" class="btn btn-primary">
            <?php echo isset($service_id) ? 'Save' : 'Save'; ?>
        </button>
    </form>
</body>