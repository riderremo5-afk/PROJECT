<?php
session_start();
if(!isset($_SESSION['admin_name'])) {
    header("location:admin_login.php");
    exit();
}

include("dbconnect.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry = mysqli_query($conn, "SELECT * FROM crops WHERE id='$id'");
    $crop = mysqli_fetch_assoc($qry);
    
    if(!$crop) {
        header("location:view_crops.php");
        exit();
    }
}

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $crop_name = mysqli_real_escape_string($conn, $_POST['crop_name']);
    $soil_type = mysqli_real_escape_string($conn, $_POST['soil_type']);
    $fertilizer = mysqli_real_escape_string($conn, $_POST['fertilizer']);
    $water_irrigation = mysqli_real_escape_string($conn, $_POST['water_irrigation']);
    $season = mysqli_real_escape_string($conn, $_POST['season']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    $qry = "UPDATE crops SET crop_name='$crop_name', soil_type='$soil_type', fertilizer='$fertilizer', 
            water_irrigation='$water_irrigation', season='$season', description='$description' WHERE id='$id'";
    
    if(mysqli_query($conn, $qry)) {
        $success = true;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Crop Details - Agriculture Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }
        .navbar {
            background-color: #2d6a4f;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }
        .nav-links a:hover {
            color: #95d5b2;
        }
        .form-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .form-container h2 {
            color: #2d6a4f;
            margin-bottom: 30px;
            font-size: 28px;
            text-align: center;
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
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #d8f3dc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #2d6a4f;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        .btn-submit {
            width: 100%;
            padding: 15px;
            background-color: #2d6a4f;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-submit:hover {
            background-color: #1b4332;
        }
        .btn-back {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #52b788;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-back:hover {
            background-color: #2d6a4f;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="logo">
                <i class="fas fa-user-shield"></i>
                Admin Dashboard
            </div>
            <div class="nav-links">
                <a href="admin_home.php">Dashboard</a>
                <span style="color: white;"><i class="fas fa-user"></i> <?php echo $_SESSION['admin_name']; ?></span>
                <a href="admin_logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </nav>

    <div class="form-container">
        <a href="view_crops.php" class="btn-back"><i class="fas fa-arrow-left"></i> Back to Crops</a>
        <h2><i class="fas fa-edit"></i> Edit Crop Details</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $crop['id']; ?>">
            <div class="form-group">
                <label>Crop Name</label>
                <input type="text" name="crop_name" value="<?php echo $crop['crop_name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Soil Type</label>
                <input type="text" name="soil_type" value="<?php echo $crop['soil_type']; ?>" required>
            </div>
            <div class="form-group">
                <label>Fertilizer</label>
                <input type="text" name="fertilizer" value="<?php echo $crop['fertilizer']; ?>" required>
            </div>
            <div class="form-group">
                <label>Water Irrigation</label>
                <input type="text" name="water_irrigation" value="<?php echo $crop['water_irrigation']; ?>" required>
            </div>
            <div class="form-group">
                <label>Season</label>
                <select name="season" required>
                    <option value="">Select Season</option>
                    <option value="Summer" <?php if($crop['season']=='Summer') echo 'selected'; ?>>Summer</option>
                    <option value="Winter" <?php if($crop['season']=='Winter') echo 'selected'; ?>>Winter</option>
                    <option value="Monsoon" <?php if($crop['season']=='Monsoon') echo 'selected'; ?>>Monsoon</option>
                    <option value="Spring" <?php if($crop['season']=='Spring') echo 'selected'; ?>>Spring</option>
                    <option value="Autumn" <?php if($crop['season']=='Autumn') echo 'selected'; ?>>Autumn</option>
                    <option value="All Season" <?php if($crop['season']=='All Season') echo 'selected'; ?>>All Season</option>
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" required><?php echo $crop['description']; ?></textarea>
            </div>
            <button type="submit" name="update" class="btn-submit">
                <i class="fas fa-save"></i> Update Crop Details
            </button>
        </form>
    </div>

    <?php if(isset($success)) { ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Crop details updated successfully',
            confirmButtonColor: '#2d6a4f'
        }).then(() => {
            window.location.href = 'view_crops.php';
        });
    </script>
    <?php } ?>

    <?php if(isset($error)) { ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Failed to update crop details',
            confirmButtonColor: '#2d6a4f'
        });
    </script>
    <?php } ?>
</body>
</html>
