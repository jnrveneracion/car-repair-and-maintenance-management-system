<?php
include('../connection.php');

// Check if the message_id parameter is set in the URL
if (isset($_GET['message_id'])) {
    $message_id = $_GET['message_id'];
    //  database query to fetch messages
    $query = "SELECT * FROM message WHERE message_id = $message_id"; // Modify the query to select a specific message
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Database query failed: " . mysqli_error($con));
    }
} else {
    // Handle the case where message_id is not provided in the URL
    echo "Error: Message ID not specified.";
    exit(); // You may want to exit the script here to prevent further execution
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
    <title>My Message</title>
    <style>
        .head-section-txt {
            width: fit-content;
            float: right;
            background-color: color(srgb 0.9702 0.7395 0.3452);
            padding: 10px 20px;
            font-weight: 500;
        }

        th,
        td {
            text-align: center;
        }

        th {
            background-color: black !important;
            color: white !important;
            font-weight: 400;
            border: 1px solid white;
        }

        td {
            background-color: rgb(12, 48, 71) !important;
            color: white !important;
            border: 1px solid white;
            vertical-align: middle;
        }

        .btn-a {
            background-color: color(srgb 0.325 0.325 0.325);
            border: none;
            color: white !important;
        }

        .table-section {
            min-width: 200px;
            overflow: scroll;
            margin: 0 auto;
            width: 450px;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <?php include "../common/navbar-for-folder.php" ?>

    <div class="f-height d-flex justify-content-center" style="margin-bottom: 50px;">
        <div class="text-white section">
            <div>
                <div>
                    <a href="">
                        <div class="head-section-txt">MY MESSAGE</div>
                    </a>
                </div>
                <div style="padding: 50px 0px;;">
                    <div class="table-section">

                        <table class="table">

                            <tbody>
                                <?php
                                // Loop through the fetched messages and display them in rows
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<th scope='row'>Message ID:</th>";
                                    echo "<td>" . $row['message_id'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Date:</th>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Subject:</th>";
                                    echo "<td>" . $row['subject'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Message:</th>";
                                    echo "<td>" . $row['message'] . "</td>";
                                    echo "</tr>";

                                    echo "<tr>";
                                    echo "<th scope='row'>Admin Response:</th>";
                                    echo "<td>" . $row['admin_response'] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>

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