<?php
include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_new_password'];
    
    // Retrieve the user's current password from the database (replace 'your_query_here' with the actual query)
    $client_id = $_SESSION['client_id']; // Adjust this based on your session management
    $query = "SELECT password FROM client WHERE client_id = $client_id";
    $result = mysqli_query($con, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentPassword = $row['password'];
        
        // Verify the old password
        if ($oldPassword === $currentPassword) {
            // Check if new password and confirmation match
            if ($newPassword === $confirmPassword) {
                // Update the user's password in the database
                $updateQuery = "UPDATE client SET password = '$newPassword' WHERE client_id = $client_id";
                if (mysqli_query($con, $updateQuery)) {
                    // Password successfully changed
                    header("Location: my-account.php"); // Redirect to a success page
                    exit();
                } else {
                    // Error updating password in the database
                    $error = "Error updating password.";
                }
            } else {
                // Password and confirmation don't match
                $error = "New password and confirmation do not match.";
            }
        } else {
            // Old password is incorrect
            $error = "Old password is incorrect.";
        }
    } else {
        // Error querying the database
        $error = "Database error.";
    }
}
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/bg-style-a.css">
    <title>My Account</title>
    <style>
        .head-section-txt {
            width: fit-content;
            float: right;
            background-color: color(srgb 0.9702 0.7395 0.3452);
            padding: 10px 20px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <?php include "../common/navbar-for-folder.php" ?>

    <div class="f-height d-flex justify-content-center">
        <div class="text-white section" style="height: 400px;">
            <div>
                <div>
                    <div class="head-section-txt">MY ACCOUNT</div>
                    <h1>PASSWORD</h1>

                      <!-- Display error message if any -->
                      <?php if (isset($error)) { ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php } ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Old Password:</label>
                            <input type="password" class="registration-input form-control" id="old_password" name="old_password"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password:</label>
                            <input type="password" class="registration-input form-control" id="new_password" name="new_password"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_new_password" class="form-label">Confirm New Password:</label>
                            <input type="password" class="registration-input form-control input-number-only"
                                id="confirm_new_password" name="confirm_new_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
    



                </div>
            </div>
        </div>
    </div>

    <?php include "../common/footer-for-folder.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>
</body>

</html>