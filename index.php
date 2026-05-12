<?php
include 'db.php';

$sql = "SELECT * FROM certifications ORDER BY employee_id ASC";
$result = mysqli_query($conn, $sql);

$today = date("Y-m-d");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Operator Certification Registry</title>

    <style>

        body {
            font-family: Arial;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #1f2937;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            width: 90%;
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th {
            background-color: #1f2937;
            color: white;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        .allowed {
            color: green;
            font-weight: bold;
        }

        .expired {
            color: red;
            font-weight: bold;
        }

    </style>

</head>

<body>

<header>
    <h1>Operator Certification Registry</h1>
    <p>Industrial Safety & Qualification Dashboard</p>
</header>
<nav style="background:#374151; padding:15px; text-align:center;">

    <a href="index.php" 
    style="color:white; margin:15px; text-decoration:none; font-weight:bold;">
    Dashboard
    </a>

    <a href="add_certification.php" 
    style="color:white; margin:15px; text-decoration:none; font-weight:bold;">
    Add Certification
    </a>

    <a href="search.php" 
    style="color:white; margin:15px; text-decoration:none; font-weight:bold;">
    Search
    </a>

</nav>

<div class="container">

    <h2>Today's Certified Operators</h2>

    <table>

        <tr>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Machine Type</th>
            <th>License Expiry Date</th>
            <th>Safety Level</th>
            <th>Status</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $row['employee_id']; ?></td>

            <td><?php echo $row['employee_name']; ?></td>

            <td><?php echo $row['machine_type_qualified']; ?></td>

            <td><?php echo $row['license_expiry_date']; ?></td>

            <td><?php echo $row['safety_level_cleared']; ?></td>

            <td>

                <?php

                if($row['license_expiry_date'] >= $today) {

                    echo "<span class='allowed'>ALLOWED</span>";

                } else {

                    echo "<span class='expired'>EXPIRED</span>";

                }

                ?>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>