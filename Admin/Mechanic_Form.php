<?php
include('../connection.php');

$mechanic_id = isset($_GET['mechanic_id']) ? $_GET['mechanic_id'] : null;

if ($mechanic_id) {
    $sql = "SELECT * FROM mechanic WHERE mechanic_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $mechanic_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Populate form fields with existing data
        $fullname = $row['fullname'];
        $skill = $row['skill'];
        $username = $row['username'];
        $password = $row['password'];
        $address = $row['address'];
    }
    mysqli_stmt_close($stmt);
}
?>
<head>
    <title>Mechanic</title>
</head>
<body>
    <h1>Mechanic</h1>
    <form method="POST" action="Manage_Mechanic.php">
      
        <div class="mb-3">
            <label for="fullname" class="form-label">Mechanic Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required value="<?php echo isset($row['fullname']) ? $row['fullname'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="skill" class="form-label">Skill</label>
            <input type="text" class="form-control" id="skill" name="skill" required value="<?php echo isset($row['skill']) ? $row['skill'] : ''; ?>">
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

        

        <button type="submit" class="btn btn-primary"><?php echo isset($mechanic_id) ? : 'Submit'; ?></button>
    </form>
</body>