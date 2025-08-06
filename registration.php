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
    <title>Regestration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>Create Account</h1>
            <p>Please fill in your information to create an account</p>
        </div>
        <?php 
            if (isset($_POST["submit"])) {
                $fullname = $_POST["fullname"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $repeat_password = $_POST["repeat_password"];

                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $err = array();

                // Validate Values
                if (empty($fullname) OR empty($email) OR empty($password) OR empty($repeat_password)) {
                    array_push($err, "All fields are required.");
                }
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($err, "Email is not valid.");
                }
                if (strlen($password) < 8) {
                    array_push($err, "Password must be atleast 8 character long.");
                }
                if ($password !== $repeat_password) {
                    array_push($err, "Password does not match.");
                }
                require_once "database.php";
                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if ($rowCount > 0) {
                    array_push($err, "Email already exists.");
                }

                if (count($err) > 0) {
                    foreach ($err as $item) {
                        echo "<div class='alert alert-danger'>" . $item . "</div>";
                    }
                } else {
                    $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    if ($prepareStmt) {
                        mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'>Registration Successfull. <a href='login.php'>Login Here</a></div>";
                    } else{
                        die("Something went wrong");
                    }
                    
                }
            }
        ?>
       <form action="registration.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="fullname" placeholder="Full Name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email Address">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
        </div>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="Register" name="submit">
        </div>
       </form> 
       <div class="form-footer">
            <p>Already registered? <a href="login.php">Login Here</a></p>
       </div>
    </div>
</body>
</html>