<!-- Dito mapupunta kapag naapprove ung service request para malagay ung cost and stuff .  -->

<?php
include('../connection.php');

// Assuming you want to retrieve data from the message table and join it with the client table
$sql = "SELECT
            message.message_id,
            client.fullname AS client_name,
            client.email AS client_email,
            message.subject,
            message.date
        FROM
            message
        JOIN
            client ON message.client_id = client.client_id";

$result = mysqli_query($con, $sql);

if (!$result) {
    die("SQL query failed: " . mysqli_error($con));
}

echo '<table class="table">
        <thead>
            <tr>
                <th scope="col">Message ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>';

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>
            <td>' . $row['message_id'] . '</td>
            <td>' . $row['client_name'] . '</td>
            <td>' . $row['client_email'] . '</td>
            <td>' . $row['subject'] . '</td>
            <td>' . $row['date'] . '</td>
            <td><a href="View_Message.php?message_id=' . $row['message_id'] . '" class="btn btn-primary">View</a></td>
          </tr>';
}

echo '</tbody></table>';

mysqli_close($con);
?>
