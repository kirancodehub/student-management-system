<?php include 'db.php';
if(!isset($_SESSION['admin'])){ header("Location: login.php"); }
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $sql = "UPDATE students SET name=?, roll_no=?, class=?, email=?, phone=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $_POST['name'], $_POST['roll_no'], $_POST['class'], $_POST['email'], $_POST['phone'], $id);
    if(mysqli_stmt_execute($stmt)){ header("Location: index.php"); }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <center>
     <h1>Student Management System</h1>
<div class="container" style="max-width:600px">
    <h3>Edit Student</h3>
    <form method="POST">
        <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>" required>
        <input type="text" name="roll_no" class="form-control" value="<?= $row['roll_no'] ?>" required>
        <input type="text" name="class" class="form-control" value="<?= $row['class'] ?>" required>
        <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>" required>
        <input type="text" name="phone" class="form-control" value="<?= $row['phone'] ?>" required>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>
</center>
</body>
</html>