<?php //Display the table of user mechanics
include('../connection.php');

// Add the header and button
echo '<h2>Registered Clients</h2>';
echo '<a href="Registered_Users_Form.php" class="btn btn-success">Add Client</a>';
// Fetch data from the services_offer table
$sql = "SELECT * FROM client";
$result = mysqli_query($con, $sql);


if (!$result) {
    echo "Error: " . mysqli_error($con);
} else {
    // Check if there are rows in the result set
    if (mysqli_num_rows($result) > 0) {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th scope="col">Client ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Username</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';
        
        // Loop through the rows and populate the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                    <td>' . $row['client_id'] . '</td>
                    <td>' . $row['fullname'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['mobile_number'] . '</td>
                    <td>' . $row['address'] . '</td>
                    <td>' . $row['username'] . '</td>
             

                    <td>
                    <a href="Registered_Users_Form.php?client_id=' . $row['client_id'] . '" class="btn btn-primary">Edit</a>
                    <a href="Delete_Registered_Users.php?client_id=' . $row['client_id'] . '" class="btn btn-danger">Delete</a>
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