<?php 
$host = 'localhost'; 
$user = 'rootif0_39623030'; 
$pass = 'i6HmOUckQwZV'; 
$db_name = 'if0_39623030_XXX'; 
$conn = new mysqli($host, $user, $pass, $db_name); 
if ($conn->connect_error) { 
die('Koneksi gagal: ' . $conn->connect_error); 
} 
?> 