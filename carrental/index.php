<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Rental System</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#e3f2fd,#f8f9fa);
}

/* Card */
.card{
    background:#ffffff;
    padding:50px 40px;
    border-radius:18px;
    text-align:center;
    width:400px;
    box-shadow:0 15px 40px rgba(0,0,0,0.08);
    border:1px solid #e0e0e0;
}

.card h1{
    font-size:28px;
    margin-bottom:30px;
    color:#2c3e50;
}

/* Buttons */
.btn{
    display:block;
    width:100%;
    padding:12px;
    margin:15px 0;
    border:none;
    border-radius:10px;
    cursor:pointer;
    font-size:15px;
    font-weight:600;
    transition:0.3s;
}
a{
    text-decoration: none;
}
/* Customer Button - Soft Blue */
.customer{
    background:#4dabf7;
    color:#ffff;
    text-decoration:none;
}

.customer:hover{
    background:#339af0;
    transform:translateY(-3px);
}

/* Admin Button - Soft Green */
.admin{
    background:#51cf66;
    color: #fff;
}

.admin:hover{
    background:#40c057;
    transform:translateY(-3px);
}
</style>
</head>
<body>

<div class="card">
    <h1>🚗 Car Rental System</h1>

    <a href="customer_login.php">
        <button class="btn customer">Customer Login</button>
    </a>

    <a href="admin/admin_login.php">
        <button class="btn admin">Admin Login</button>
    </a>
</div>

</body>
</html>