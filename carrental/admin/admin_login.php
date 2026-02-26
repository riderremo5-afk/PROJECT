<?php
include '../db.php';
session_start();
if(isset($_POST['login'])){
$res=$conn->query("SELECT * FROM admin WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'");
if($res->num_rows>0){
$_SESSION['admin']=1;
header("Location:admin_dashboard.php");
}else{
echo "Invalid Login";
}
}
?>
<link rel="stylesheet" href="../css/style.css">
<div class="content">
<div class="card">
<h2>Admin Login</h2>
<form method="POST">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">
<button name="login">Login</button>
</form>
</div>
</div>
