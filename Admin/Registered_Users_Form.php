<?php
include('../connection.php');

$client_id = isset($_GET['client_id']) ? $_GET['client_id'] : null;

if ($client_id) {
    $sql = "SELECT * FROM client WHERE client_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $client_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Populate form fields with existing data
        $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : $row['fullname'];
        $email = isset($_POST["email"]) ? $_POST["email"] : $row['email'];
        $mobile_number = isset($_POST["mobile_number"]) ? $_POST["mobile_number"] : $row['mobile_number'];
        $address = isset($_POST["address"]) ? $_POST["address"] : $row['address'];
        $username = isset($_POST["username"]) ? $_POST["username"] : $row['username'];
        $password = isset($_POST["password"]) ? $_POST["password"] : $row['password'];
    } else {
        // Handle the case when no client is found
        // You may want to redirect or display an error message here
    }
    mysqli_stmt_close($stmt);
}
?>
<head>
    <title>Registered Clients</title>
</head>
<body>
    <h1>Clients</h1>
    <form method="POST" action="Manage_Registered_Users.php">
      
        <div class="mb-3">
            <label for="fullname" class="form-label">Client Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required value="<?php echo isset($row['fullname']) ? $row['fullname'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" required value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="mobile_number" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" id="mobile_number" name="mobile_number" required value="<?php echo isset($row['mobile_number']) ? $row['mobile_number'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required value="<?php echo isset($row['address']) ? $row['address'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required value="<?php echo isset($row['username']) ? $row['username'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" required value="<?php echo isset($row['password']) ? $row['password'] : ''; ?>">
        </div>

        <?php
        // If in edit mode, include a hidden input field to pass the service_id to Manage_Service_Offer.php
        if (isset($client_id)) {
            echo '<input type="hidden" name="edit_mode" value="true">';
            echo '<input type="hidden" name="client_id" value="' . $client_id . '">';
        }
        ?>

        

        <!-- <button type="submit" class="btn btn-primary"><?php echo isset($client_id) ? : 'Submit'; ?></button> -->
        <button type="submit" class="btn btn-primary">   <?php echo isset($client_id) ? 'Save' : 'Save'; ?>   </button>
    </form>
</body>