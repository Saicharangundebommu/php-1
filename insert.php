<?php
session_start(); // Start the session to store branch data
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "student_marks";   

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_no = $_POST['reg_no'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t4 = $_POST['t4'];
    $cla1 = $_POST['cla1'];
    $cla2 = $_POST['cla2'];
    $cla3 = $_POST['cla3'];
    $cla4 = $_POST['cla4'];

    // Calculate total marks
    $total_marks = ($t1 / 3) + $t2 + $t3 + $t4 + (($cla1 + $cla2 + $cla3 + $cla4) / 5);

    // Store selected branch in session
    $branch = isset($_POST['branch']) ? implode(", ", $_POST['branch']) : 'No Branch Selected';
    $_SESSION['branch'] = $branch;

    // Insert data into the database
    $sql = "INSERT INTO marks (reg_no, t1, t2, t3, t4, cla1, cla2, cla3, cla4, total_marks)
            VALUES ('$reg_no', $t1, $t2, $t3, $t4, $cla1, $cla2, $cla3, $cla4, $total_marks)";

    if ($conn->query($sql) === TRUE) {
        $message = "New record created successfully<br><br>";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Result</h2>
        <p><?php echo $message; ?></p>
        <a href="retrieve.php">Go to Retrieve Page</a>
    </div>
</body>
</html>