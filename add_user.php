<?php
session_start();
include('db.php');

if (!isset($_SESSION['admin_login'])) {
    header('Location: admin_login.php');
    exit();
}

if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];

    $query = "INSERT INTO users (username, email, password, gender) VALUES ('$username', '$email', '$password', '$gender')";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('User added successfully'); window.location.href='manage_users.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
ob_start();     
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4><i class="fas fa-user-plus me-2"></i> Add New User</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="add_user.php">
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" required placeholder="Enter username">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" required placeholder="Enter email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required placeholder="Enter password">
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
                        <button type="submit" name="add_user" class="btn btn-success btn-block w-100">
                            <i class="fas fa-user-plus me-2"></i> Add User
                        </button>
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