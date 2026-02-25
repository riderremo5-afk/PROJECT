<?php
session_start();
if(!isset($_SESSION['user_name'])) {
    header("location:user_login.php");
    exit();
}

include("dbconnect.php");

$search_query = "";
if(isset($_POST['search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search_term']);
    $search_query = "WHERE crop_name LIKE '%$search%' OR soil_type LIKE '%$search%' OR season LIKE '%$search%'";
}

$qry = mysqli_query($conn, "SELECT * FROM crops $search_query ORDER BY added_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Crops - Agriculture Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
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
        .search-section {
            background-color: #52b788;
            padding: 40px 20px;
        }
        .search-container {
            max-width: 800px;
            margin: 0 auto;
        }
        .search-container h2 {
            color: white;
            text-align: center;
            margin-bottom: 30px;
            font-size: 32px;
        }
        .search-form {
            display: flex;
            gap: 10px;
        }
        .search-form input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
        }
        .search-form button {
            padding: 15px 40px;
            background-color: #2d6a4f;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .search-form button:hover {
            background-color: #1b4332;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
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

    <section class="search-section">
        <div class="search-container">
            <h2><i class="fas fa-search"></i> Search Crop Information</h2>
            <form method="POST" class="search-form">
                <input type="text" name="search_term" placeholder="Search by crop name, soil type, or season..." value="<?php echo isset($_POST['search_term']) ? $_POST['search_term'] : ''; ?>">
                <button type="submit" name="search"><i class="fas fa-search"></i> Search</button>
            </form>
        </div>
    </section>

    <div class="container">
        <div class="crop-grid">
            <?php
            if(mysqli_num_rows($qry) > 0) {
                while($row = mysqli_fetch_assoc($qry)) {
            ?>
            <div class="crop-card" data-aos="fade-up">
                <div class="crop-header">
                    <h3><?php echo $row['crop_name']; ?></h3>
                    <span class="season-badge"><?php echo $row['season']; ?></span>
                </div>
                <div class="crop-info">
                    <p><strong><i class="fas fa-mountain"></i> Soil Type:</strong> <?php echo $row['soil_type']; ?></p>
                    <p><strong><i class="fas fa-flask"></i> Fertilizer:</strong> <?php echo $row['fertilizer']; ?></p>
                    <p><strong><i class="fas fa-tint"></i> Water Irrigation:</strong> <?php echo $row['water_irrigation']; ?></p>
                    <p><strong><i class="fas fa-info-circle"></i> Description:</strong> <?php echo $row['description']; ?></p>
                </div>
            </div>
            <?php
                }
            } else {
            ?>
            <div class="no-data">
                <i class="fas fa-inbox" style="font-size: 60px; color: #ccc; margin-bottom: 20px;"></i>
                <h3>No crops found</h3>
                <p>Try searching with different keywords</p>
            </div>
            <?php } ?>
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
