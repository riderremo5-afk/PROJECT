<?php
include("dbconnect.php");
session_start();

if(isset($_POST['btn']))
{
    extract($_POST);
    $qry=mysqli_query($conn,"select * from admin where name='$uname' && psw='$password'");
    $num=mysqli_num_rows($qry);
    if($num==1)
    {
        $_SESSION['admin_name'] = $uname;
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Redirecting...</title>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
        <body>
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Welcome Admin!',
            text: 'Login successful',
            confirmButtonColor: '#2d6a4f'
        }).then(function() {
            window.location.href = 'admin_home.php';
        });
        </script>
        </body>
        </html>
        <?php
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Farmer Scheme Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=1600');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(45, 106, 79, 0.85);
            z-index: -1;
        }
        .login-container {
            background-color: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 450px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .login-header i {
            font-size: 60px;
            color: #2d6a4f;
            margin-bottom: 20px;
        }
        .login-header h2 {
            color: #2d6a4f;
            font-size: 28px;
            margin-bottom: 10px;
        }
        .login-header p {
            color: #666;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #2d6a4f;
            font-weight: 600;
        }
        .input-group {
            position: relative;
        }
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #2d6a4f;
        }
        .form-group input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #d8f3dc;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        .form-group input:focus {
            outline: none;
            border-color: #2d6a4f;
        }
        .btn-login {
            width: 100%;
            padding: 15px;
            background-color: #2d6a4f;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-login:hover {
            background-color: #1b4332;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: #2d6a4f;
            text-decoration: none;
            font-weight: 600;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container" data-aos="zoom-in">
        <div class="login-header">
            <i class="fas fa-user-shield"></i>
            <h2>Admin Login</h2>
            <p>Access Administrator Dashboard</p>
        </div>
        <form method="POST" action="">
            <div class="form-group">
                <label for="uname">Username</label>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="uname" name="uname" required>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" required>
                </div>
            </div>
            <button type="submit" name="btn" class="btn-login">Login</button>
        </form>
        <div class="back-link">
            <a href="index.php"><i class="fas fa-arrow-left"></i> Back to Home</a>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800
        });
    </script>
</body>
</html>

<?php
if(isset($_POST['btn']) && !isset($_SESSION['admin_name']))
{
    ?>
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Login Failed',
        text: 'Invalid username or password',
        confirmButtonColor: '#2d6a4f'
    });
    </script>
    <?php
}
?>
