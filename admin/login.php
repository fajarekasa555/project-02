<?php
require_once '../config.php';

// Jika sudah login, redirect ke dashboard
if (isLoggedIn()) {
    redirect(ADMIN_URL . '/index.php');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error = 'Username dan password harus diisi!';
    } else {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        
        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            $_SESSION['admin_nama'] = $admin['nama_lengkap'];
            
            // Update last login
            $stmt = $conn->prepare("UPDATE admin SET last_login = NOW() WHERE id = ?");
            $stmt->execute([$admin['id']]);
            
            redirect(ADMIN_URL . '/index.php');
        } else {
            $error = 'Username atau password salah!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ArsiRAB CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8">
        <div class="text-center mb-8">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-building-columns text-white text-3xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">ArsiRAB CMS</h1>
            <p class="text-gray-600 mt-2">Login untuk mengakses dashboard</p>
        </div>

        <?php if ($error): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <?= $error ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">
                    <i class="fas fa-user mr-2"></i>Username
                </label>
                <input type="text" name="username" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Masukkan username">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">
                    <i class="fas fa-lock mr-2"></i>Password
                </label>
                <input type="password" name="password" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Masukkan password">
            </div>

            <button type="submit" 
                    class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 rounded-lg font-semibold hover:shadow-lg transition duration-300">
                <i class="fas fa-sign-in-alt mr-2"></i>Login
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            <p>Default login:</p>
            <p class="font-mono bg-gray-100 p-2 rounded mt-2">
                Username: <strong>admin</strong><br>
                Password: <strong>admin123</strong>
            </p>
        </div>
    </div>
</body>
</html>