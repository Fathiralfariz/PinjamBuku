<?php 
session_start(); 
require_once '../config/db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    $query = $conn->prepare("SELECT * FROM petugas WHERE username = ?"); 
    $query->bind_param("s", $username); 
    $query->execute(); 
    $result = $query->get_result()->fetch_assoc(); 

    if ($result && password_verify($password, $result['password'])) { 
        $_SESSION['petugas'] = $result; 
        header("Location: ../index.php"); 
        exit; 
    } else { 
        $error = "Username atau password salah!"; 
    } 
} 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Login Petugas</title>
</head>
<body class="bg-light">
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow" style="width: 400px;">
            <div class="card-body">
                <h2 class="text-center mb-4">Login Petugas</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <?= isset($error) ? "<p class='text-danger mt-3'>$error</p>" : "" ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
