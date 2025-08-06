<?php 
    session_start();
    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
    }
    require_once "database.php";

    $email = $_SESSION["user"];
    $success_message = "";
    $error_message = "";

    // Handle password change
    if (isset($_POST["change_password"])) {
        $current_password = $_POST["current_password"];
        $new_password = $_POST["new_password"];
        $confirm_password = $_POST["confirm_password"];

        // Verify current password
        $sql = "SELECT password FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($user = mysqli_fetch_assoc($result)) {
                if (password_verify($current_password, $user["password"])) {
                    if ($new_password === $confirm_password) {
                        if (strlen($new_password) >= 8) {
                            $passwordHash = password_hash($new_password, PASSWORD_DEFAULT);
                            $update_sql = "UPDATE users SET password = ? WHERE email = ?";
                            $update_stmt = mysqli_stmt_init($conn);
                            if (mysqli_stmt_prepare($update_stmt, $update_sql)) {
                                mysqli_stmt_bind_param($update_stmt, "ss", $passwordHash, $email);
                                if (mysqli_stmt_execute($update_stmt)) {
                                    $success_message = "Password updated successfully!";
                                } else {
                                    $error_message = "Failed to update password.";
                                }
                            }
                        } else {
                            $error_message = "New password must be at least 8 characters long.";
                        }
                    } else {
                        $error_message = "New passwords do not match.";
                    }
                } else {
                    $error_message = "Current password is incorrect.";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Settings - Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation -->
    <?php include 'nav.php'; ?>

    <div class="container py-4">
        <!-- Security Section -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card security-card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0"><i class="bi bi-shield-lock"></i> Security Settings</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($success_message): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $success_message; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($error_message): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>

                        <form action="" method="post" class="password-form">
                            <div class="mb-4">
                                <label for="current_password" class="form-label">Current Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="new_password" class="form-label">New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="confirm_password" class="form-label">Confirm New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="change_password" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> Change Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
