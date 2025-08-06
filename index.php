<?php 
    session_start();
    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
    }

    // Get fullname from session
    $fullname = isset($_SESSION["fullname"]) ? $_SESSION["fullname"] : "User";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation -->
    <?php include 'nav.php'; ?>

    <div class="container py-4">
        <!-- Welcome Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h2 class="card-title"><i class="bi bi-person-badge"></i> Welcome Back, <?php echo $fullname; ?>!</h2>
                        <p class="card-text">This is your personal dashboard. Here you can manage your account and access various features.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Widgets -->
        <div class="row g-4">
            <!-- Quick Stats -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-clock-history display-4 text-primary mb-3"></i>
                        <h5 class="card-title">Last Login</h5>
                        <p class="card-text"><?php echo date('F j, Y H:i'); ?></p>
                    </div>
                </div>
            </div>

            <!-- Profile Status -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-person-check display-4 text-success mb-3"></i>
                        <h5 class="card-title">Account Status</h5>
                        <p class="card-text">Active</p>
                    </div>
                </div>
            </div>

            <!-- Actions Card -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-gear-fill display-4 text-warning mb-3"></i>
                        <h5 class="card-title">Quick Actions</h5>
                        <div class="d-grid gap-2">
                            <a href="profile.php" class="btn btn-outline-primary btn-sm"><i class="bi bi-pencil"></i> Edit Profile</a>
                            <a href="security.php" class="btn btn-outline-secondary btn-sm"><i class="bi bi-shield-lock"></i> Change Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Features Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="bi bi-list-check"></i> Available Features</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="profile.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Profile Settings
                                <span class="badge bg-primary rounded-pill"><i class="bi bi-arrow-right"></i></span>
                            </a>
                            <a href="security.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Security Settings
                                <span class="badge bg-primary rounded-pill"><i class="bi bi-arrow-right"></i></span>
                            </a>
                            <a href="profile.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                Account Information
                                <span class="badge bg-primary rounded-pill"><i class="bi bi-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>