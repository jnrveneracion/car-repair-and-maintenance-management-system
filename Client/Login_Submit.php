<?php
require('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check the client table
     // Check the client table
  $stmt = mysqli_prepare($con, "SELECT client_id, fullname, password FROM client WHERE email = ?");
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_bind_result($stmt, $client_id, $fullname, $hashed_password);

  if (mysqli_stmt_fetch($stmt) && password_verify($password, $hashed_password)) {
        // Client login successful
        $_SESSION['client_id'] = $client_id; //client_id dapat eto
        $_SESSION['fullname'] = $fullname;
        $_SESSION['role'] = 'client';
        header("Location: ../index.php"); // Redirect to client dashboard | kapag nasa labas yung file ../ lang
        exit();
    }

    // Close the statement for client table
    mysqli_stmt_close($stmt);

    // Check the admin table
    $stmt = mysqli_prepare($con, "SELECT admin_id, fullname FROM admin WHERE email = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $admin_id, $fullname);

    if (mysqli_stmt_fetch($stmt)) {
        // Admin login successful
        session_start(); // Start a session if not already started | Need tanggalin to kapag maraming admin users
        $_SESSION['user_id'] = $admin_id; //Palitan ng admin_id
        $_SESSION['fullname'] = $fullname;
        $_SESSION['role'] = 'admin';
        header("Location: ../Admin/Admin_Dashboard.php"); // Redirect to admin dashboard
        exit();
    }

    // Close the statement for admin table
    mysqli_stmt_close($stmt);

    // Check the mechanic table
    $stmt = mysqli_prepare($con, "SELECT mechanic_id, fullname, password FROM mechanic WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $mechanic_id, $fullname, $hashed_password);

    if (mysqli_stmt_fetch($stmt) && password_verify($password, $hashed_password)) {
        // Mechanic login successful
        //session_start(); // Start a session if not already started
        $_SESSION['mechanic_id'] = $mechanic_id;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['role'] = 'mechanic';
        header("Location: ../Mechanic/dashboard.php"); // Redirect to mechanic dashboard
        exit();
    }


    // Close the statement for mechanic table
    mysqli_stmt_close($stmt);

    // If no match found in any table, show an error message
    $error_message = "Invalid email or password";
}

// Close the database connection
mysqli_close($con);
?>