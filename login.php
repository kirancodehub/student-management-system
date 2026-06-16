<?php 
    include 'db.php';

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE username=? AND password=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) == 1){

        $_SESSION['admin'] = $username;
        header("Location: index.php");

    } else {
        $error = "Invalid login";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<center>
     <h1>Student Management System</h1>
<div class="login-box">
    <h3 class="text-center mb-4">Admin Login</h3>
        <form method="POST">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <br/>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <br/>
        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>

        <?php if(isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
    </form>
</div>
</body>
</center>
</html>