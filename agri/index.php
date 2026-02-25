<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Management System</title>
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
        .hero {
            background-image: url('https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=1600');
            background-size: cover;
            background-position: center;
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(45, 106, 79, 0.7);
        }
        .hero-content {
            position: relative;
            text-align: center;
            color: white;
            max-width: 800px;
            padding: 0 20px;
        }
        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .hero-content p {
            font-size: 20px;
            margin-bottom: 40px;
        }
        .btn-container {
            display: flex;
            gap: 20px;
            justify-content: center;
        }
        .btn {
            padding: 15px 40px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.3s;
        }
        .btn:hover {
            transform: translateY(-3px);
        }
        .btn-primary {
            background-color: #52b788;
            color: white;
        }
        .btn-secondary {
            background-color: #40916c;
            color: white;
        }
        .features {
            max-width: 1200px;
            margin: 80px auto;
            padding: 0 20px;
        }
        .features h2 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 50px;
            color: #2d6a4f;
        }
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        .feature-card {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }
        .feature-card i {
            font-size: 50px;
            color: #2d6a4f;
            margin-bottom: 20px;
        }
        .feature-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #2d6a4f;
        }
        .feature-card p {
            color: #666;
            line-height: 1.6;
        }
        .footer {
            background-color: #2d6a4f;
            color: white;
            text-align: center;
            padding: 30px 0;
            margin-top: 80px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="logo">
                <i class="fas fa-seedling"></i>
                Agriculture Portal
            </div>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="admin_login.php">Admin</a>
                <a href="user_login.php">User Login</a>
                <a href="user_register.php">Register</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content" data-aos="fade-up">
            <h1>Welcome to Agriculture Management System</h1>
            <p>Empowering Farmers with Agricultural Information and Crop Details</p>
            <div class="btn-container">
                <a href="user_register.php" class="btn btn-primary">Register as User</a>
                <a href="user_login.php" class="btn btn-secondary">Login</a>
            </div>
        </div>
    </section>

    <section class="features">
        <h2 data-aos="fade-up">Our Services</h2>
        <div class="feature-grid">
            <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-search"></i>
                <h3>Search Crops</h3>
                <p>Find detailed information about crops including soil type, fertilizer, and irrigation methods.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-seedling"></i>
                <h3>Crop Information</h3>
                <p>Access comprehensive crop details including suitable seasons and growing conditions.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                <i class="fas fa-tint"></i>
                <h3>Irrigation Guide</h3>
                <p>Learn about different water irrigation methods suitable for various crops.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                <i class="fas fa-flask"></i>
                <h3>Fertilizer Info</h3>
                <p>Get recommendations on appropriate fertilizers for different crop types.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="500">
                <i class="fas fa-mountain"></i>
                <h3>Soil Types</h3>
                <p>Understand which soil types are best suited for specific crops.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="600">
                <i class="fas fa-calendar"></i>
                <h3>Seasonal Guide</h3>
                <p>Know the right season to plant crops for maximum yield.</p>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; 2026 Agriculture Management System. All Rights Reserved.</p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>
</html>
