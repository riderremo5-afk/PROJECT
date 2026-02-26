<?php
include 'db.php';
session_start();

if(isset($_POST['login'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $conn->query("INSERT INTO customers(name,email) VALUES('$name','$email')");
    $_SESSION['customer_id']=$conn->insert_id;
    header("Location:customer_dashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Customer Login</title>

<style>
/* ===== BODY DESIGN ===== */
body{
    margin:0;
    padding:0;
    font-family:'Poppins', sans-serif;
    background:linear-gradient(135deg,#e0f7fa,#f1f8ff);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

/* ===== LOGIN CARD ===== */
.card{
    background:#ffffff;
    padding:45px 35px;
    width:350px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,0.1);
    text-align:center;
    border:1px solid #e3e3e3;
}

.card h2{
    margin-bottom:5px;
    color:#2c3e50;
    font-weight:700;
}

.subtitle{
    font-size:14px;
    color:#777;
    margin-bottom:25px;
}

/* ===== INPUT FIELDS ===== */
.input-group{
    position:relative;
}

.input-group input{
    width:100%;
    padding:12px 12px 12px 40px;
    margin:12px 0;
    border-radius:10px;
    border:1px solid #ccc;
    font-size:14px;
    transition:0.3s;
}

.input-group span{
    position:absolute;
    left:12px;
    top:50%;
    transform:translateY(-50%);
    font-size:16px;
}

input:focus{
    border-color:#4dabf7;
    box-shadow:0 0 0 3px rgba(77,171,247,0.2);
    outline:none;
}

/* ===== BUTTON ===== */
button{
    width:100%;
    padding:12px;
    margin-top:15px;
    background:linear-gradient(90deg,#4dabf7,#339af0);
    color:white;
    border:none;
    border-radius:12px;
    cursor:pointer;
    font-weight:600;
    font-size:15px;
    transition:0.3s;
}

button:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 20px rgba(0,0,0,0.15);
}

</style>
</head>

<body>
<div class="card">
    <h2>🚗 Welcome Back</h2>
    <p class="subtitle">Login to continue your journey</p>

    <form method="POST">

        <div class="input-group">
            <span>👤</span>
            <input type="text" name="name" placeholder="Enter your name" required>
        </div>

        <div class="input-group">
            <span>📧</span>
            <input type="email" name="email" placeholder="Enter your email" required>
        </div>

        <button name="login">🔐 Login Now</button>

    </form>
</div>
</body>
</html>
