<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks Entry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Enter Student Marks</h2>
        <form action="insert.php" method="POST">

            <!-- Branch Selection with Checkboxes -->
            <label>Branch:</label>
            <div class="branch-selection">
                <label><input type="checkbox" name="branch[]" value="AI&ML-A"> CSE-AI&ML(A)</label>
                <label><input type="checkbox" name="branch[]" value="AI&ML-B"> CSE-AI&ML(B)</label>
                <label><input type="checkbox" name="branch[]" value="CSBS"> CSE-CSBS</label>
                <label><input type="checkbox" name="branch[]" value="CS"> CSE-CS</label>
                <label><input type="checkbox" name="branch[]" value="DS"> CSE-DS</label>
            </div>
            <label for="reg_no">Registration No:</label>
            <input type="text" id="reg_no" name="reg_no" required>

            <label for="t1">T1 Mid Marks:</label>
            <input type="number" id="t1" name="t1" required>

            <label for="t2">T2 Review Marks:</label>
            <input type="number" id="t2" name="t2" required>

            <label for="t3">T3 Presentation Marks:</label>
            <input type="number" id="t3" name="t3" required>

            <label for="t4">T4 Online Test:</label>
            <input type="number" id="t4" name="t4" required>

            <label for="cla1">CLA-1:</label>
            <input type="number" id="cla1" name="cla1" required>

            <label for="cla2">CLA-2:</label>
            <input type="number" id="cla2" name="cla2" required>

            <label for="cla3">CLA-3:</label>
            <input type="number" id="cla3" name="cla3" required>

            <label for="cla4">CLA-4:</label>
            <input type="number" id="cla4" name="cla4" required>

            <input type="submit" value="Submit">
        </form>
        <a href="retrieve.php">Retrieve Details</a>
    </div>
</body>
</html>
