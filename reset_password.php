<?php
session_start();
include('db.php');

if (isset($_POST['reset_password'])) {
    $email = $_POST['email'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    if ($user) {
        $reset_token = bin2hex(random_bytes(32));

        $query = "UPDATE users SET reset_token = '$reset_token' WHERE email = '$email'";
        if ($conn->query($query) === TRUE) {
            echo "<script>alert('Password reset link has been sent to your email');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('No account found with that email address.');</script>";
    }
}
ob_start();  
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning text-white">
                    <i class="bi bi-lock me-2"></i> Reset Password
                </div>
                <div class="card-body">
                    <form method="POST" action="reset_password.php">
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required placeholder="Enter your registered email">
                        </div>

                        <div class="form-group mb-4">
                            <button type="submit" name="reset_password" class="btn btn-warning w-100">
                                <i class="bi bi-lock me-2"></i> Reset Password
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="footer-text">
                        Remember your password? <a href="login.php">Login here</a>
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