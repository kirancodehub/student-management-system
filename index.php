<?php include 'db.php';
if(!isset($_SESSION['admin'])){ header("Location: login.php"); }
$result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <center>
     <h1>Student Management System</h1>
 </center>
<div class="container">
    <div class="header-row">
        <h3>Student List</h3>
        <div>
            <a href="add.php" class="btn btn-success">Add Student</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Roll No</th><th>Class</th><th>Email</th><th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['roll_no'] ?></td>
            <td><?= $row['class'] ?></td>
            <td><?= $row['email'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>