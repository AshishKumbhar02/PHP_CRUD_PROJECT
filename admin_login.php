<?php
session_start();
include('db.php');

if (isset($_SESSION['admin_login'])) {
    header('Location: dashboard.php');
    exit();
}

if (isset($_POST['submit'])) {
    $adminname = $_POST['adminname'];
    $admin_password = $_POST['password'];

    $query = "SELECT * FROM admins WHERE adminname = '$adminname'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();

        if (password_verify($admin_password, $admin['password'])) {
            $_SESSION['admin_login'] = $adminname; 
            header('Location: dashboard.php');
            exit();
        } else {
            $error_message = "Invalid admin credentials!";
        }
    } else {
        $error_message = "Admin not found!";
    }
}
ob_start();  
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-person-lock me-2"></i> Admin Login
                </div>
                <div class="card-body">
                    <?php if (isset($error_message)): ?>
                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php endif; ?>
                    <form method="POST" action="admin_login.php">
                        <!-- Admin Name -->
                        <div class="form-group mb-3">
                            <label for="adminname">Admin Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" name="adminname" required placeholder="Enter your admin name">
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" class="form-control" name="password" required placeholder="Enter your password">
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="form-group mb-4">
                            <button type="submit" name="submit" class="btn btn-primary w-100">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$pageContent = ob_get_clean();
include 'template.php';
?>