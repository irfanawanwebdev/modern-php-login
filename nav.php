<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="bi bi-house-door"></i> Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" 
                       href="index.php"><i class="bi bi-speedometer2"></i> Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>" 
                       href="profile.php"><i class="bi bi-person"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'security.php' ? 'active' : ''; ?>" 
                       href="security.php"><i class="bi bi-shield-lock"></i> Security</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <span class="text-light me-3"><i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION["fullname"]); ?></span>
                <a href="logout.php" class="btn btn-light btn-sm"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </div>
        </div>
    </div>
</nav>
