<?php
include 'db.php';
session_start();

if(!isset($_SESSION['customer_id'])){
    header("Location: customer_login.php");
    exit();
}

$cars=$conn->query("SELECT * FROM cars WHERE status='available'");

if(isset($_POST['book'])){
$car=$_POST['car'];
$km=$_POST['km'];
$from=$_POST['from'];
$to=$_POST['to'];

$data=$conn->query("SELECT * FROM cars WHERE id=$car")->fetch_assoc();
$total=$data['price_per_km']*$km;

$conn->query("INSERT INTO bookings(customer_id,car_id,from_location,to_location,kilometers,total_price,status)
VALUES(".$_SESSION['customer_id'].",$car,'$from','$to',$km,$total,'Booked')");

echo "<script>alert('Car Booked Successfully');</script>";
}
?>

<link rel="stylesheet" href="css/style.css">

<div class="sidebar">
<h2>Customer</h2>
<a href="customer_dashboard.php">Dashboard</a>
<a href="cancel_booking.php">Cancel Booking</a>
<a href="feedback.php">Feedback</a>
<a href="about.php">Reviews</a>
<a href="logout.php">Logout</a>
</div>

<div class="content">
<h2>Available Cars</h2>

<div class="car-container">

<?php while($row=$cars->fetch_assoc()){ ?>

<div class="car-card">
<img src="images/<?= $row['image'] ?>" alt="Car Image">

<div class="info">
<h3><?= $row['car_name'] ?></h3>
<p>₹<?= $row['price_per_km'] ?> per KM</p>

<form method="POST">
<input type="hidden" name="car" value="<?= $row['id'] ?>">
<input type="text" name="from" placeholder="From Location" required>
<input type="text" name="to" placeholder="To Location" required>
<input type="number" name="km" placeholder="Kilometers" required>
<button name="book">Book Now</button>
</form>

</div>
</div>

<?php } ?>

</div>
</div>
