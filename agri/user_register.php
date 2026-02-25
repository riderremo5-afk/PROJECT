<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration - Agriculture Management System</title>
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
            background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1600');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
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
        .register-container {
            background-color: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 600px;
        }
        .register-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .register-header i {
            font-size: 60px;
            color: #2d6a4f;
            margin-bottom: 20px;
        }
        .register-header h2 {
            color: #2d6a4f;
            font-size: 28px;
            margin-bottom: 10px;
        }
        .register-header p {
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
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #d8f3dc;
            border-radius: 8px;
            font-size: 16px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: border-color 0.3s;
        }
        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #2d6a4f;
        }
        .btn-register {
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
        .btn-register:hover {
            background-color: #1b4332;
        }
        .links {
            text-align: center;
            margin-top: 20px;
        }
        .links a {
            color: #2d6a4f;
            text-decoration: none;
            font-weight: 600;
            margin: 0 10px;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container" data-aos="zoom-in">
        <div class="register-header">
            <i class="fas fa-user-plus"></i>
            <h2>User Registration</h2>
            <p>Join our portal to access agricultural information</p>
        </div>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Full Name</label>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" id="name" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <div class="input-group">
                    <i class="fas fa-phone"></i>
                    <input type="text" id="mobile" name="mobile" pattern="[0-9]{10}" title="Enter 10 digit mobile number" required>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <div class="input-group">
                    <i class="fas fa-map-marker-alt"></i>
                    <textarea id="address" name="address" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" required>
                </div>
            </div>
            <button type="submit" name="btn_register" class="btn-register">Register</button>
        </form>
        <div class="links">
            <a href="user_login.php">Already have an account? Login</a> | 
            <a href="index.php">Back to Home</a>
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
include("dbconnect.php");
extract($_POST);

if(isset($_POST['btn_register']))
{
    $check_qry = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $check_count = mysqli_num_rows($check_qry);
    
    if($check_count > 0)
    {
        ?>
        <script>
        Swal.fire({
            icon: 'warning',
            title: 'Email Already Exists',
            text: 'This email is already registered. Please login or use different email.',
            confirmButtonColor: '#2d6a4f'
        });
        </script>
        <?php
    }
    else
    {
        $qry = mysqli_query($conn, "INSERT INTO users (name, email, mobile, address, password) VALUES ('$name', '$email', '$mobile', '$address', '$password')");
        
        if($qry)
        {
            ?>
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful!',
                text: 'You can now login with your credentials',
                confirmButtonColor: '#2d6a4f'
            }).then(function() {
                window.location.href = 'user_login.php';
            });
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Registration Failed',
                text: 'Please try again later',
                confirmButtonColor: '#2d6a4f'
            });
            </script>
            <?php
        }
    }
}
?>
