<?php
include 'config/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$sql = "SELECT * FROM cars";
$result = $conn->query($sql);
?>

<h2>Available Cars</h2>
<div class="cars-container">
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='car-card'>";
        echo "<img src='images/".$row['image']."' alt='".$row['name']."'>";
        echo "<h3>".$row['name']."</h3>";
        echo "<p>Price per day: $".$row['price']."</p>";
        echo "<a href='book_car.php?id=".$row['id']."'>Book Now</a>";
        echo "</div>";
    }
} else {
    echo "<p>No cars available at the moment.</p>";
}
?>
</div>

<?php include 'includes/footer.php'; ?>
