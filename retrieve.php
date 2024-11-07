<?php
session_start(); // Start the session to access session variables

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "student_marks";   

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT * FROM marks";
$result = $conn->query($sql);

// Check for SQL errors
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-left">
                <h2><?php echo isset($_SESSION['branch']) ? $_SESSION['branch'] : 'No Branch Selected'; ?></h2>
            </div>
            <div class="header-center">
                <h2>Student Marks Details</h2>
            </div>
            <div class="header-right">
                <h2>ACSE Department</h2>
            </div>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Registration No</th>
                        <th>T1 Mid Marks</th>
                        <th>T2 Review Marks</th>
                        <th>T3 Presentation Marks</th>
                        <th>T4 Online Test</th>
                        <th>CLA-1</th>
                        <th>CLA-2</th>
                        <th>CLA-3</th>
                        <th>CLA-4</th>
                        <th>Total Marks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['reg_no']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['t1']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['t2']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['t3']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['t4']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['cla1']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['cla2']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['cla3']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['cla4']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['total_marks']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No records found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <a href="index.php">Add New Marks</a>
        <div class="print">
        <button type="button" onclick="window.print()">Print Certificate</button>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>