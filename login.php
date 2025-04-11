<?php
include('db.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        echo "<script>alert('Login successful');</script>";
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
}
ob_start();  
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Login
                </div>
                <div class="card-body">
                    <form method="POST" action="login.php">
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required placeholder="Enter your email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required placeholder="Enter your password">
                        </div>

                        <div class="form-group mb-4">
                            <button type="submit" name="login" class="btn btn-primary w-100">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Login
                            </button>
                        </div>
                    </form>
                    <div class="forgot-password-link text-center">
                        <a href="reset_password.php">Forgot Password?</a>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <p class="footer-text">
                        Don't have an account? <a href="register.php">Register here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$pageContent = ob_get_clean();
include 'template.php';
?>
