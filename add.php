<?php 

include 'db.php';

if(!isset($_SESSION['admin'])){ 

    header("Location: login.php"); 
}

if(isset($_POST['submit'])){
    $sql = "INSERT INTO students (name, roll_no, class, email, phone) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $_POST['name'], $_POST['roll_no'], $_POST['class'], $_POST['email'], $_POST['phone']);
    if(mysqli_stmt_execute($stmt)){ header("Location: index.php"); }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <center>
     <h1>Student Management System</h1>
 </center>
<div class="container" style="max-width:600px">
    <h3>Add Student</h3>
    <form method="POST">
        <table>
            <input type="text" name="name" class="form-control" placeholder="Name" required>
            <input type="text" name="roll_no" class="form-control" placeholder="Roll No" required>
            <input type="text" name="class" class="form-control" placeholder="Class" required>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="text" name="phone" class="form-control" placeholder="Phone" required>
            <button type="submit" name="submit" class="btn btn-success">Save</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </table>
        
    </form>
</div>
</body>
</html>