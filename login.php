<?php
session_start();

include("db.php");

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM form WHERE username='$user_name' AND password='$password'";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: index.html");
        exit();
    } else {
        $error_message = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form in HTML and CSS | Codehal</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" required>
                <i class='bx bxs-user'></i>
             </div>
             
             <div class="input-box">
                <input type="password" name="password" required>
                <i class='bx bxs-lock-alt' ></i>
             </div>
             <div class="remember-forgot">
             <label><input type="checkbox">Remember me</label>
             <a href="#">Forgot Password</a>
            </div>
             <button type="submit" class="btn">Login</button>
             <div class="register-link">
                <p>Don't have an account ?
                <a href="register.php">Register</a>
                </p>
             </div>
        </form>
    </div>
</body>
</html>