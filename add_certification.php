<?php
include 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    $employee_name = $_POST['employee_name'];
    $machine_type = $_POST['machine_type_qualified'];
    $expiry_date = $_POST['license_expiry_date'];
    $safety_level = $_POST['safety_level_cleared'];

    $sql = "INSERT INTO certifications 
    (employee_id, employee_name, machine_type_qualified, license_expiry_date, safety_level_cleared)
    VALUES 
    ('$employee_id', '$employee_name', '$machine_type', '$expiry_date', '$safety_level')";

    if (mysqli_query($conn, $sql)) {
        $message = "Certification added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Certification</title>

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
            width: 60%;
            margin: 30px auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
        }

        label {
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 18px 0;
        }

        button {
            background-color: #1f2937;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
        }

        .message {
            color: green;
            font-weight: bold;
        }

        a {
            display: inline-block;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<header>
    <h1>Add Operator Certification</h1>
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

    <h2>Register New Certification</h2>

    <p class="message"><?php echo $message; ?></p>

    <form method="POST" action="">

        <label>Employee ID</label>
        <input type="text" name="employee_id" required>

        <label>Employee Name</label>
        <input type="text" name="employee_name" required>

        <label>Machine Type Qualified</label>
        <select name="machine_type_qualified" required>
            <option value="Laser Cutter">Laser Cutter</option>
            <option value="Overhead Crane">Overhead Crane</option>
            <option value="Forklift">Forklift</option>
            <option value="CNC Machine">CNC Machine</option>
            <option value="Welding Robot">Welding Robot</option>
        </select>

        <label>License Expiry Date</label>
        <input type="date" name="license_expiry_date" required>

        <label>Safety Level Cleared</label>
        <select name="safety_level_cleared" required>
            <option value="Level 1">Level 1</option>
            <option value="Level 2">Level 2</option>
            <option value="Level 3">Level 3</option>
        </select>

        <button type="submit">Add Certification</button>

    </form>

</div>

</body>
</html>