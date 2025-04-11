<?php
include('db.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];

    $query = "INSERT INTO users (username, email, password, gender) VALUES ('$username', '$email', '$password', '$gender')";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Registration successful'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
ob_start();     
?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-person-plus me-2"></i> Register
                </div>
                <div class="card-body">
                    <form method="POST" action="register.php">
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" required placeholder="Enter your username">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required placeholder="Enter your email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required placeholder="Enter your password">
                        </div>

                        <div class="form-group mb-3">
                            <label>Gender</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="gender" value="Male" required>
                                <label class="form-check-label">Male</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="gender" value="Female" required>
                                <label class="form-check-label">Female</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="gender" value="Other" required>
                                <label class="form-check-label">Other</label>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <button type="submit" name="register" class="btn btn-primary w-100">
                                <i class="bi bi-person-plus me-2"></i> Register
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="footer-text">
                        Already have an account? <a href="login.php">Login here</a>
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