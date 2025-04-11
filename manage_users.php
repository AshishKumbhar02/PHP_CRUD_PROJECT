<?php
session_start();
include('db.php');

if (!isset($_SESSION['admin_login'])) {
    header('Location: admin_login.php');
    exit();
}

$query = "SELECT * FROM users";
$result = $conn->query($query);

ob_start();
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4><i class="fas fa-users me-2"></i> Manage Users</h4>
                    <a href="dashboard.php" class="btn btn-secondary btn-sm float-end">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                    <a href="add_user.php" class="btn btn-success btn-sm float-end me-2">
                        <i class="fas fa-user-plus me-2"></i> Add New User
                    </a>
                </div>
                <div class="card-body">
                    <h5>All Registered Users</h5>
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
                            if ($result->num_rows > 0) {
                                while ($user = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $user['id'] . "</td>";
                                    echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['gender']) . "</td>";  
                                    echo "<td>
                                            <a href='edit_user.php?id=" . $user['id'] . "' class='btn btn-sm btn-warning'>
                                                <i class='fas fa-edit me-2'></i> Edit
                                            </a>
                                            <a href='delete_user.php?id=" . $user['id'] . "' class='btn btn-sm btn-danger'>
                                                <i class='fas fa-trash-alt me-2'></i> Delete
                                            </a>
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