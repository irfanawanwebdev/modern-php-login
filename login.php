<?php 
    session_start();
    if (isset($_SESSION["user"])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>Welcome Back!</h1>
            <p>Please login to your account</p>
        </div>
        <?php
            if (isset($_POST["login"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                require_once "database.php";
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($user) {
                    if (password_verify($password, $user["password"])) {
                        session_start();
                        $_SESSION["user"] = $email;
                        $_SESSION["fullname"] = $user["full_name"];
                    
                        header("Location: index.php");
                        die();
                    } else{
                        echo "<div class='alert alert-danger'>Password does not match.</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Email does not match.</div>";
                }
            }
        ?>

        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter Email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Enter Password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div class="form-footer">
            <p>Not registered yet? <a href="registration.php">Register Here</a></p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>