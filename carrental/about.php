<?php
session_start();
include 'db.php';

/* Logout */
if(isset($_POST['logout'])){
    session_destroy();
    header("Location: customer_dashboard.php");
    exit();
}

/* Show:
   - All 5 star ratings permanently
   - 3 & 4 star always visible
   - 1 & 2 star only within 2 days
*/

$data = $conn->query("
SELECT * FROM feedback 
WHERE rating >= 3 
   OR (rating IN (1,2) AND created_at >= NOW() - INTERVAL 2 DAY)
ORDER BY created_at DESC
");
?>

<link rel="stylesheet" href="css/style.css">

<style>
.stars{
    color:gold;
    font-size:20px;
}
.logout-btn{
    float:right;
    background:red;
    color:white;
    padding:8px 15px;
    border:none;
    border-radius:6px;
    cursor:pointer;
}
.logout-btn:hover{
    background:darkred;
}
</style>

<div class="content">

<h2>Customer Reviews</h2>

<form method="POST">
    <button class="logout-btn" name="logout">Logout</button>
</form>

<br><br>

<?php while($row=$data->fetch_assoc()){ ?>
<div class="card">
    <h3><?= $row['name'] ?></h3>

    <!-- ⭐ Show Gold Stars -->
    <div class="stars">
        <?php
        for($i=1;$i<=5;$i++){
            if($i <= $row['rating']){
                echo "★";
            } else {
                echo "☆";
            }
        }
        ?>
    </div>

    <p><?= $row['message'] ?></p>
</div>
<?php } ?>

</div>
