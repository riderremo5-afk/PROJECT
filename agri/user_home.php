<?php
session_start();
if(!isset($_SESSION['user_name'])) {
    header("location:user_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Agriculture Management System</title>
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
        .featured-scheme {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }
        .featured-scheme h2 {
            color: #2d6a4f;
            margin-bottom: 20px;
            font-size: 24px;
        }
        .scheme-featured-card {
            background-color: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            border-left: 4px solid #52b788;
        }
        .scheme-featured-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }
        .scheme-featured-header h3 {
            color: #2d6a4f;
            font-size: 22px;
        }
        .scheme-featured-badge {
            background-color: #52b788;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
        .scheme-featured-body p {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.8;
        }
        .scheme-featured-body strong {
            color: #2d6a4f;
        }
        .btn-view-all {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 30px;
            background-color: #2d6a4f;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-view-all:hover {
            background-color: #1b4332;
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
                <i class="fas fa-seedling"></i>
                User Portal
            </div>
            <div class="nav-links">
                <a href="user_home.php">Dashboard</a>
                <a href="search_crops.php">Search Crops</a>
                <span style="color: white;"><i class="fas fa-user"></i> <?php echo $_SESSION['user_name']; ?></span>
                <a href="user_logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </nav>

    <section class="welcome-section">
        <h1>Welcome, <?php echo $_SESSION['user_name']; ?>!</h1>
        <p>Explore agricultural information and crop details</p>
    </section>

    <?php
    include("dbconnect.php");
    $total_crops_qry = mysqli_query($conn, "SELECT COUNT(*) as total FROM crops");
    $total_crops = mysqli_fetch_assoc($total_crops_qry)['total'];
    
    $summer_qry = mysqli_query($conn, "SELECT COUNT(*) as total FROM crops WHERE season = 'Summer'");
    $summer_count = mysqli_fetch_assoc($summer_qry)['total'];
    
    $winter_qry = mysqli_query($conn, "SELECT COUNT(*) as total FROM crops WHERE season = 'Winter'");
    $winter_count = mysqli_fetch_assoc($winter_qry)['total'];
    
    $monsoon_qry = mysqli_query($conn, "SELECT COUNT(*) as total FROM crops WHERE season = 'Monsoon'");
    $monsoon_count = mysqli_fetch_assoc($monsoon_qry)['total'];
    
    $latest_crop_qry = mysqli_query($conn, "SELECT * FROM crops ORDER BY added_date DESC LIMIT 1");
    $latest_crop = mysqli_fetch_assoc($latest_crop_qry);
    ?>

    <div class="dashboard-container">
        <div class="stats-container">
            <div class="stat-box" data-aos="fade-up" data-aos-delay="50">
                <div class="stat-icon" style="background-color: #d8f3dc;">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-details">
                    <h3><?php echo $total_crops; ?></h3>
                    <p>Total Crops</p>
                </div>
            </div>
            <div class="stat-box" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon" style="background-color: #b7e4c7;">
                    <i class="fas fa-sun"></i>
                </div>
                <div class="stat-details">
                    <h3><?php echo $summer_count; ?></h3>
                    <p>Summer Crops</p>
                </div>
            </div>
            <div class="stat-box" data-aos="fade-up" data-aos-delay="150">
                <div class="stat-icon" style="background-color: #95d5b2;">
                    <i class="fas fa-snowflake"></i>
                </div>
                <div class="stat-details">
                    <h3><?php echo $winter_count; ?></h3>
                    <p>Winter Crops</p>
                </div>
            </div>
            <div class="stat-box" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon" style="background-color: #74c69d;">
                    <i class="fas fa-cloud-rain"></i>
                </div>
                <div class="stat-details">
                    <h3><?php echo $monsoon_count; ?></h3>
                    <p>Monsoon Crops</p>
                </div>
            </div>
        </div>

        <?php if($latest_crop) { ?>
        <div class="featured-scheme" data-aos="fade-up">
            <h2><i class="fas fa-star"></i> Featured Crop</h2>
            <div class="scheme-featured-card">
                <div class="scheme-featured-header">
                    <h3><?php echo $latest_crop['crop_name']; ?></h3>
                    <span class="scheme-featured-badge"><?php echo $latest_crop['season']; ?></span>
                </div>
                <div class="scheme-featured-body">
                    <p><strong><i class="fas fa-align-left"></i> Description:</strong> <?php echo $latest_crop['description']; ?></p>
                    <p><strong><i class="fas fa-mountain"></i> Soil Type:</strong> <?php echo $latest_crop['soil_type']; ?></p>
                    <p><strong><i class="fas fa-flask"></i> Fertilizer:</strong> <?php echo $latest_crop['fertilizer']; ?></p>
                    <p><strong><i class="fas fa-tint"></i> Water Irrigation:</strong> <?php echo $latest_crop['water_irrigation']; ?></p>
                </div>
                <a href="search_crops.php" class="btn-view-all">View All Crops</a>
            </div>
        </div>
        <?php } ?>

        <div class="dashboard-grid">
            <div class="dashboard-card" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-search"></i>
                <h3>Search Crops</h3>
                <p>Find the best crop information available for you</p>
                <a href="search_crops.php" class="btn-card">Search Now</a>
            </div>
            <div class="dashboard-card" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-info-circle"></i>
                <h3>About Portal</h3>
                <p>Learn more about our portal and services</p>
                <a href="index.php" class="btn-card">Learn More</a>
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
