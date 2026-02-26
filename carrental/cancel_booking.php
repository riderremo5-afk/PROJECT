<?php
include 'db.php';
session_start();

/* ✅ Check if customer logged in */
if(!isset($_SESSION['customer_id'])){
    header("Location: customer_login.php");
    exit();
}

$customer_id = $_SESSION['customer_id'];

/* ✅ Cancel Booking */
if(isset($_GET['id'])){
    $booking_id = intval($_GET['id']);
    $conn->query("UPDATE bookings 
                  SET status='Cancelled' 
                  WHERE id=$booking_id 
                  AND customer_id=$customer_id");
}

/* ✅ Get Customer Bookings */
$book = $conn->query("SELECT * FROM bookings 
                      WHERE customer_id=$customer_id");
?>

<link rel="stylesheet" href="css/style.css">

<div class="content">
<div class="card">
<h2>Your Bookings</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>From</th>
    <th>To</th>
    <th>Total Price</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php while($row=$book->fetch_assoc()){ ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['from_location'] ?></td>
    <td><?= $row['to_location'] ?></td>
    <td>₹<?= $row['total_price'] ?></td>
    <td><?= $row['status'] ?></td>
    <td>
        <?php if($row['status'] == 'Booked'){ ?>
            <a href="?id=<?= $row['id'] ?>">
                <button>Cancel</button>
            </a>
        <?php } else { ?>
            Cancelled
        <?php } ?>
    </td>
</tr>
<?php } ?>

</table>
</div>
</div>
