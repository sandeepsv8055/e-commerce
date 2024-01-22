 <?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['gmail'];
        $password = $_POST['password'];


        if(!empty($user_name) && !empty($password))
        {


            $query = "insert into form (username, password) values ('$user_name', '$password')";
             mysqli_query($con, $query);
            
            echo"<script type='text/javascript'> alert('Successfully Register')</script>";

        }
        else
        {
            echo"<script type='text/javascript'> alert('Please Enter some Valid Infomation')</script>";
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
            <h1>Sign Up</h1>
            <div class="input-box">
                <input type="text" name="gmail" required>
                <i class='bx bxs-user'></i>
             </div>
             
             <div class="input-box">
                <input type="password" name="password" required>
                <i class='bx bxs-lock-alt' ></i>
             </div>
             <div class="remember-forgot">
             <label><input type="checkbox">Remember me</label>
            </div>
             <button type="submit" class="btn">Register</button>
             <div class="register-link">
                <p>Don't have an account ?
                <a href="login.php">Login</a>
                </p>
             </div>
        </form>
    </div>
</body>
</html>