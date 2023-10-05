<?php
require('../connection.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Create a prepared statement
    $stmt = mysqli_prepare($con, "INSERT INTO client (fullname, email, mobile_number, address, username, password) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssssss", $fullname, $email, $mobile_number, $address, $username, $password); // No need to hash the password

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Registration successful!";
        // You can redirect to a success page here if needed
    } else {
        echo "Error: " . mysqli_error($con);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}
?>
<h1>User Registration</h1>

<body>  
    <form method="POST" action="">
    <div class="mb-3">
        <label for="fullname" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="fullname" name="fullname" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="mobile_number" class="form-label">Mobile Number</label>
        <input type="text" class="form-control" id="mobile_number" name="mobile_number" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>
