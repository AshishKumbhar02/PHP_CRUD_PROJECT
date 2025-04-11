<?php
session_start();
include('db.php');

if (!isset($_SESSION['admin_login'])) {
    header('Location: admin_login.php');
    exit();
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    if (!$user) {
        echo "<script>alert('User not found!'); window.location.href = 'manage_users.php';</script>";
        exit();
    }

    // Update the user data
    if (isset($_POST['update_user'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $gender = $_POST['gender'];

        $update_query = "UPDATE users SET username = '$username', email = '$email', password = '$password', gender = '$gender' WHERE id = '$user_id'";

        if ($conn->query($update_query) === TRUE) {
            echo "<script>alert('User updated successfully'); window.location.href = 'manage_users.php';</script>";
        } else {
            echo "<script>alert('Error updating user: " . $conn->error . "');</script>";
        }
    }
}
ob_start(); 
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning text-white">
                    <h4><i class="fas fa-edit me-2"></i> Edit User</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Gender</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="gender" value="Male" <?php echo ($user['gender'] == 'Male' ? 'checked' : ''); ?> required>
                                <label class="form-check-label">Male</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="gender" value="Female" <?php echo ($user['gender'] == 'Female' ? 'checked' : ''); ?> required>
                                <label class="form-check-label">Female</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="gender" value="Other" <?php echo ($user['gender'] == 'Other' ? 'checked' : ''); ?> required>
                                <label class="form-check-label">Other</label>
                            </div>
                        </div>
                        <button type="submit" name="update_user" class="btn btn-warning btn-block w-100">
                            <i class="fas fa-save me-2"></i> Update User
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