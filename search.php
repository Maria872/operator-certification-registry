<?php
include 'db.php';

$results = null;
$today = date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];

    $sql = "SELECT * FROM certifications
            WHERE employee_id LIKE '%$search%'
            OR employee_name LIKE '%$search%'
            OR machine_type_qualified LIKE '%$search%'
            ORDER BY employee_id ASC";

    $results = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Search Certifications</title>

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
            padding: 25px;
            border-radius: 10px;
        }

        input {
            width: 70%;
            padding: 12px;
            margin-right: 10px;
        }

        button {
            background-color: #1f2937;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
        }

        a {
            display: inline-block;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
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
    <h1>Search Operator Certifications</h1>
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

    <a href="index.php">Back to Dashboard</a>

    <h2>Search by Employee ID, Name or Machine Type</h2>

    <form method="POST" action="">
        <input type="text" name="search" placeholder="Example: EMP001, Laser Cutter, Forklift" required>
        <button type="submit">Search</button>
    </form>

    <?php if ($results !== null) { ?>

        <table>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Machine Type</th>
                <th>License Expiry Date</th>
                <th>Safety Level</th>
                <th>Status</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($results)) { ?>

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

    <?php } ?>

</div>

</body>
</html>