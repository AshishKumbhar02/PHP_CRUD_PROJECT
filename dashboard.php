<?php
session_start();
include('db.php');

if (!isset($_SESSION['admin_login'])) {
    header('Location: admin_login.php');
    exit();
}
ob_start(); 
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-tachometer-alt me-2"></i> Admin Dashboard</h4>
                    <a href="logout.php" class="btn btn-danger btn-sm float-end">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </div>
                <div class="card-body">
                    <h5>Welcome, <?php echo htmlspecialchars($_SESSION['admin_login']); ?></h5>
                    <p>Here you can manage your users.</p>

                    <a href="manage_users.php" class="btn btn-primary">
                        <i class="fas fa-users me-2"></i> Manage Users
                    </a>
                    
                    <hr>
                    
                    <h5>Users List</h5>
                    <table class="table table-bordered mt-3">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Gender</th> 
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM users";
                            $result = $conn->query($query);

                            if ($result->num_rows > 0) {
                                while ($user = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $user['id'] . "</td>";
                                    echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['gender']) . "</td>";  
                                    echo "<td>
                                            <a href='edit_user.php?id=" . $user['id'] . "' class='btn btn-sm btn-warning'>Edit</a>
                                            <a href='delete_user.php?id=" . $user['id'] . "' class='btn btn-sm btn-danger'>Delete</a>
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No users found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$pageContent = ob_get_clean();
include 'template.php';
?>