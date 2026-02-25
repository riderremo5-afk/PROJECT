<?php
session_start();
if(!isset($_SESSION['admin_name'])) {
    header("location:admin_login.php");
    exit();
}

include("dbconnect.php");

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM crops WHERE id='$id'");
    header("location:view_crops.php");
    exit();
}

$qry = mysqli_query($conn, "SELECT * FROM crops ORDER BY added_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Crops - Agriculture Management System</title>
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
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .header h2 {
            color: #2d6a4f;
            font-size: 28px;
        }
        .btn-add {
            padding: 12px 25px;
            background-color: #2d6a4f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-add:hover {
            background-color: #1b4332;
        }
        .crop-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }
        .crop-card {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .crop-card:hover {
            transform: translateY(-5px);
        }
        .crop-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 2px solid #d8f3dc;
        }
        .crop-header h3 {
            color: #2d6a4f;
            font-size: 22px;
        }
        .season-badge {
            background-color: #52b788;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
        }
        .crop-info {
            margin-bottom: 15px;
        }
        .crop-info p {
            color: #666;
            margin-bottom: 10px;
            line-height: 1.6;
        }
        .crop-info strong {
            color: #2d6a4f;
        }
        .crop-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .btn-edit {
            flex: 1;
            padding: 10px;
            background-color: #2d6a4f;
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-edit:hover {
            background-color: #1b4332;
        }
        .btn-delete {
            flex: 1;
            padding: 10px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .no-data {
            text-align: center;
            padding: 50px;
            background-color: white;
            border-radius: 10px;
            color: #666;
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

    <div class="container">
        <div class="header">
            <h2><i class="fas fa-seedling"></i> All Crop Details</h2>
            <a href="add_crop.php" class="btn-add"><i class="fas fa-plus-circle"></i> Add New Crop</a>
        </div>

        <div class="crop-grid">
            <?php
            if(mysqli_num_rows($qry) > 0) {
                while($row = mysqli_fetch_assoc($qry)) {
            ?>
            <div class="crop-card">
                <div class="crop-header">
                    <h3><?php echo $row['crop_name']; ?></h3>
                    <span class="season-badge"><?php echo $row['season']; ?></span>
                </div>
                <div class="crop-info">
                    <p><strong><i class="fas fa-mountain"></i> Soil Type:</strong> <?php echo $row['soil_type']; ?></p>
                    <p><strong><i class="fas fa-flask"></i> Fertilizer:</strong> <?php echo $row['fertilizer']; ?></p>
                    <p><strong><i class="fas fa-tint"></i> Water Irrigation:</strong> <?php echo $row['water_irrigation']; ?></p>
                    <p><strong><i class="fas fa-info-circle"></i> Description:</strong> <?php echo $row['description']; ?></p>
                    <p><strong><i class="fas fa-calendar"></i> Added:</strong> <?php echo date('d M Y', strtotime($row['added_date'])); ?></p>
                </div>
                <div class="crop-actions">
                    <a href="edit_crop.php?id=<?php echo $row['id']; ?>" class="btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="?delete=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this crop?')">
                        <i class="fas fa-trash"></i> Delete
                    </a>
                </div>
            </div>
            <?php
                }
            } else {
            ?>
            <div class="no-data">
                <i class="fas fa-inbox" style="font-size: 60px; color: #ccc; margin-bottom: 20px;"></i>
                <h3>No crops added yet</h3>
                <p>Click "Add New Crop" to add crop details</p>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
