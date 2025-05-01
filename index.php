<?php
session_start();

$valid_username = "admin";
$valid_password = "password123";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Alya Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-300 to-pink-300 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <div class="flex justify-center mb-6">
            <img src="images/alya.png" alt="Logo Alya" class="w-20 h-20 rounded-full shadow-md">
        </div>
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-6">Login ke Alya Portal</h2>

        <?php if ($error): ?>
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-1" for="username">Username</label>
                <input type="text" name="username" id="username" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>
            <div class="mb-6">
                <label class="block text-gray-600 text-sm mb-1" for="password">Password</label>
                <input type="password" name="password" id="password" required class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-400">
            </div>
            <button type="submit" class="w-full bg-purple-500 hover:bg-purple-600 text-white py-2 rounded transition duration-200">Login</button>
        </form>
    </div>
</body>
</html>
