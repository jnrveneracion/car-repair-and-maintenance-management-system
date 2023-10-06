<?php //Display the table of user mechanics
include('../connection.php');

// Add the header and button
echo '<h2>Mechanics</h2>';
echo '<a href="Mechanic_Form.php" class="btn btn-success">Add Mechanic</a>';
// Fetch data from the services_offer table
$sql = "SELECT * FROM mechanic";
$result = mysqli_query($con, $sql);


if (!$result) {
    echo "Error: " . mysqli_error($con);
} else {
    // Check if there are rows in the result set
    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">Mechanic ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Skill</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
        
        // Loop through the rows and populate the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['mechanic_id'] . '</td>
                    <td>' . $row['fullname'] . '</td>
                    <td>' . $row['address'] . '</td>
                    <td>' . $row['skill'] . '</td>
                    <td>' . $row['username'] . '</td>
                    <td>' . $row['password'] . '</td>

                    <td>
                    <a href="Mechanic_Form.php?mechanic_id=' . $row['mechanic_id'] . '" class="btn btn-primary">Edit</a>
                    <a href="Delete_Mechanic.php?mechanic_id=' . $row['mechanic_id'] . '" class="btn btn-danger">Delete</a>
                </td>
                  </tr>';
        }
        
        echo '</tbody></table>';
    } else {
        echo "No records found.";
    }
    
    mysqli_free_result($result);
}

mysqli_close($con);
?>