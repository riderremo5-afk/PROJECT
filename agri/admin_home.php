<?php
session_start();
if(!isset($_SESSION['admin_name'])) {
    header("location:admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Agriculture Management System</title>
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
        .welcome-section {
            background-color: #52b788;
            color: white;
            padding: 40px 20px;
            text-align: center;
        }
        .welcome-section h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        .dashboard-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        .stat-box {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.3s;
        }
        .stat-box:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .stat-icon i {
            font-size: 35px;
            color: #2d6a4f;
        }
        .stat-details h3 {
            font-size: 32px;
            color: #2d6a4f;
            margin-bottom: 5px;
        }
        .stat-details p {
            color: #666;
            font-size: 16px;
        }
        .recent-activity {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }
        .recent-activity h2 {
            color: #2d6a4f;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .activity-card {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #2d6a4f;
        }
        .activity-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .activity-header h3 {
            color: #2d6a4f;
            font-size: 20px;
        }
        .activity-badge {
            background-color: #2d6a4f;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
        }
        .activity-card p {
            color: #666;
            margin-bottom: 10px;
            line-height: 1.6;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        .dashboard-card {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            cursor: pointer;
        }
        .dashboard-card:hover {
            transform: translateY(-10px);
        }
        .dashboard-card i {
            font-size: 60px;
            color: #2d6a4f;
            margin-bottom: 20px;
        }
        .dashboard-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #2d6a4f;
        }
        .dashboard-card p {
            color: #666;
            margin-bottom: 20px;
        }
        .btn-card {
            display: inline-block;
            padding: 12px 30px;
            background-color: #2d6a4f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-card:hover {
            background-color: #1b4332;
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
                <span style="color: white;"><i class="fas fa-user"></i> <?php echo $_SESSION['admin_name']; ?></span>
                <a href="admin_logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </nav>

    <section class="welcome-section">
        <h1>Welcome, <?php echo $_SESSION['admin_name']; ?>!</h1>
        <p>Manage agricultural information and users</p>
    </section>

    <?php
    include("dbconnect.php");
    $crop_count_qry = mysqli_query($conn, "SELECT COUNT(*) as total FROM crops");
    $crop_count = mysqli_fetch_assoc($crop_count_qry)['total'];
    
    $user_count_qry = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
    $user_count = mysqli_fetch_assoc($user_count_qry)['total'];
    
    $recent_crop_qry = mysqli_query($conn, "SELECT * FROM crops ORDER BY added_date DESC LIMIT 1");
    $recent_crop = mysqli_fetch_assoc($recent_crop_qry);
    ?>

    <div class="dashboard-container">
        <div class="stats-container">
            <div class="stat-box" data-aos="fade-up" data-aos-delay="50">
                <div class="stat-icon" style="background-color: #d8f3dc;">
                    <i class="fas fa-seedling"></i>
                </div>
                <div class="stat-details">
                    <h3><?php echo $crop_count; ?></h3>
                    <p>Total Crops</p>
                </div>
            </div>
            <div class="stat-box" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon" style="background-color: #b7e4c7;">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-details">
                    <h3><?php echo $user_count; ?></h3>
                    <p>Registered Users</p>
                </div>
            </div>
        </div>

        <?php if($recent_crop) { ?>
        <div class="recent-activity" data-aos="fade-up">
            <h2><i class="fas fa-clock"></i> Latest Crop Added</h2>
            <div class="activity-card">
                <div class="activity-header">
                    <h3><?php echo $recent_crop['crop_name']; ?></h3>
                    <span class="activity-badge"><?php echo $recent_crop['season']; ?></span>
                </div>
                <p><strong>Added on:</strong> <?php echo date('d M Y, h:i A', strtotime($recent_crop['added_date'])); ?></p>
                <p><strong>Soil Type:</strong> <?php echo $recent_crop['soil_type']; ?></p>
                <p><?php echo substr($recent_crop['description'], 0, 150) . '...'; ?></p>
            </div>
        </div>
        <?php } ?>

        <div class="dashboard-grid">
            <div class="dashboard-card" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-plus-circle"></i>
                <h3>Add Crop Details</h3>
                <p>Add crop information with soil, fertilizer, irrigation and season</p>
                <a href="add_crop.php" class="btn-card">Add Details</a>
            </div>
            <div class="dashboard-card" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-list"></i>
                <h3>View Crops</h3>
                <p>View and manage all crop information</p>
                <a href="view_crops.php" class="btn-card">View Details</a>
            </div>
            <div class="dashboard-card" data-aos="fade-up" data-aos-delay="300">
                <i class="fas fa-users"></i>
                <h3>Registered Users</h3>
                <p>View all registered users in the system</p>
                <a href="view_users.php" class="btn-card">View Users</a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>
</html>
