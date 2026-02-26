<?php
session_start();

if(!isset($_SESSION['customer_id'])){
    header("Location: customer_login.php");
    exit();
}
?>
<link rel="stylesheet" href="css/style.css">

<style>

/* Animated Background */
.content{
    margin-left:240px;
    padding:40px;
    min-height:100vh;
    background:#ffffff;
    position:relative;
    overflow:hidden;
}

/* ================= COLORED FLOATING CIRCLES ================= */

.circle{
    position:absolute;
    border-radius:50%;
    opacity:0.25;
    animation: float 6s ease-in-out infinite;
}

/* Blue */
.circle.blue{
    width:200px;
    height:200px;
    background:#4cc9f0;
    top:50px;
    left:100px;
}

/* Pink */
.circle.pink{
    width:220px;
    height:220px;
    background:#f72585;
    bottom:120px;
    left:250px;
    animation-duration:8s;
}

/* Yellow */
.circle.yellow{
    width:180px;
    height:180px;
    background:#ffd60a;
    top:250px;
    right:200px;
    animation-duration:7s;
}

/* Red */
.circle.red{
    width:240px;
    height:240px;
    background:#ff4d4d;
    bottom:50px;
    right:120px;
    animation-duration:9s;
}

/* Floating Animation */
@keyframes float{
    0%{transform:translateY(0px);}
    50%{transform:translateY(-30px);}
    100%{transform:translateY(0px);}
}

/* Welcome Box */
.welcome-box{
    text-align:center;
    margin-top:120px;
    animation: slideUp 1.5s ease-out;
    position:relative;
    z-index:2;
}

.welcome-box h1{
    font-size:45px;
    font-weight:600;
    letter-spacing:2px;
    animation: glow 2s infinite alternate;
}

/* Slogan */
.welcome-box h2{
    margin-top:20px;
    font-size:22px;
    font-weight:400;
    color:#555;
    animation: float 4s ease-in-out infinite;
}

.welcome-box p{
    margin-top:15px;
    font-size:18px;
    color:#777;
}

/* Slide Animation */
@keyframes slideUp{
    from{
        transform:translateY(60px);
        opacity:0;
    }
    to{
        transform:translateY(0);
        opacity:1;
    }
}

/* Glow Effect */
@keyframes glow{
    from{
        text-shadow:0 0 10px rgba(0,0,0,0.2);
    }
    to{
        text-shadow:0 0 25px rgba(0,0,0,0.4);
    }
}

</style>

<div class="sidebar">
<h2>Customer</h2>
<a href="book_car.php">Book Car</a>
<a href="cancel_booking.php">Cancel Booking</a>
<a href="feedback.php">Feedback</a>
<a href="about.php">Reviews</a>
<a href="logout.php">Logout</a>
</div>

<div class="content">

    <!-- Colored Floating Circles -->
    <div class="circle blue"></div>
    <div class="circle pink"></div>
    <div class="circle yellow"></div>
    <div class="circle red"></div>

    <div class="welcome-box">
        <h1>Welcome Friends 🚗</h1>
        <h2>"Ride Smart. Ride Safe. Ride Anytime."</h2>
        <p>Your trusted partner for smooth and affordable journeys.</p>
    </div>

</div>
