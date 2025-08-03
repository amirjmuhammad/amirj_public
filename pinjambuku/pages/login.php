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
<form method="POST"> 
<h2>Login Petugas</h2> 
<input type="text" name="username" placeholder="Username" required><br> 
<input type="password" name="password" placeholder="Password" 
required><br> 
<button type="submit">Login</button> 
<?= isset($error) ? "<p style='color:red;'>$error</p>" : "" ?> 
</form>