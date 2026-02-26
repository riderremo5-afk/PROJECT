<?php
include '../db.php';
$data=$conn->query("SELECT bookings.*,customers.name,cars.car_name
FROM bookings
JOIN customers ON bookings.customer_id=customers.id
JOIN cars ON bookings.car_id=cars.id");
?>
<link rel="stylesheet" href="../css/style.css">
<div class="content">
<h2>All Bookings</h2>
<table border="1">
<tr><th>Customer</th><th>Car</th><th>From</th><th>To</th><th>Price</th><th>Status</th></tr>
<?php while($row=$data->fetch_assoc()){ ?>
<tr>
<td><?= $row['name'] ?></td>
<td><?= $row['car_name'] ?></td>
<td><?= $row['from_location'] ?></td>
<td><?= $row['to_location'] ?></td>
<td>₹<?= $row['total_price'] ?></td>
<td><?= $row['status'] ?></td>
</tr>
<?php } ?>
</table>
</div>
