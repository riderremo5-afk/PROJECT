<?php
include 'config/db.php';

if(isset($_GET['id'])){
    $car_id = $_GET['id'];
    $car = $conn->query("SELECT * FROM cars WHERE id=$car_id")->fetch_assoc();
}

if(isset($_POST['book'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $days = $_POST['days'];
    $total = $car['price'] * $days;

    $stmt = $conn->prepare("INSERT INTO bookings (car_id, name, email, days, total) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issid", $car_id, $name, $email, $days, $total);
    $stmt->execute();
    echo "<p>Booking successful! Total: $".$total."</p>";
}
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<h2>Book <?php echo $car['name']; ?></h2>
<form method="POST">
    <input type="text" name="name" placeholder="Your Name" required><br>
    <input type="email" name="email" placeholder="Your Email" required><br>
    <input type="number" name="days" placeholder="Number of Days" required><br>
    <button type="submit" name="book">Book Now</button>
</form>

<?php include 'includes/footer.php'; ?>
