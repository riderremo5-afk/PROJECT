<?php
include '../db.php';
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

/* =========================
   DELETE CAR
========================= */
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);

    // Get image name first
    $imgData = $conn->query("SELECT image FROM cars WHERE id=$id")->fetch_assoc();

    if($imgData){
        $imagePath = "../images/".$imgData['image'];

        // Delete image file if exists
        if(file_exists($imagePath)){
            unlink($imagePath);
        }

        // Delete from database
        $conn->query("DELETE FROM cars WHERE id=$id");
    }

    header("Location: manage_cars.php");
    exit();
}

/* =========================
   ADD CAR WITH IMAGE
========================= */
if(isset($_POST['add'])){

    $name  = $_POST['name'];
    $price = $_POST['price'];

    $imageName = $_FILES['image']['name'];
    $tempName  = $_FILES['image']['tmp_name'];

    move_uploaded_file($tempName, "../images/".$imageName);

    $conn->query("INSERT INTO cars(car_name,price_per_km,status,image)
    VALUES('$name',$price,'available','$imageName')");
}

/* =========================
   FETCH ALL CARS
========================= */
$cars = $conn->query("SELECT * FROM cars");
?>

<link rel="stylesheet" href="../css/style.css">

<div class="content">

<div class="card">
<h2>Add New Car</h2>

<form method="POST" enctype="multipart/form-data">
<input type="text" name="name" placeholder="Car Name" required>
<input type="number" name="price" placeholder="Price per KM" required>
<input type="file" name="image" required>
<button name="add">Add Car</button>
</form>

</div>

<h2>All Cars</h2>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Image</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row=$cars->fetch_assoc()){ ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['car_name'] ?></td>
<td>₹<?= $row['price_per_km'] ?></td>
<td>
<?php if(!empty($row['image'])){ ?>
<img src="../images/<?= $row['image'] ?>" width="80">
<?php } ?>
</td>
<td><?= $row['status'] ?></td>
<td>
<a href="?delete=<?= $row['id'] ?>" 
   onclick="return confirm('Are you sure to delete this car?')">
   <button style="background:red;">Delete</button>
</a>
</td>
</tr>
<?php } ?>

</table>

</div>
