<?php
session_start();
include 'db.php';

/* Logout */
if(isset($_POST['logout'])){
    session_destroy();
    header("Location: customer_dashboard.php");
    exit();
}

/* Insert Feedback */
if(isset($_POST['send'])){
    $conn->query("INSERT INTO feedback(name,message,rating,created_at)
    VALUES('".$_POST['name']."','".$_POST['message']."','".$_POST['rating']."',NOW())");
}
?>

<link rel="stylesheet" href="css/style.css">

<style>

/* Logout Button */
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

/* Star Rating */
.star-rating{
    direction: rtl;
    display:inline-block;
    font-size:35px;
}

.star-rating input{
    display:none;
}

.star-rating label{
    color:#ccc;
    cursor:pointer;
    transition:0.3s;
}

.star-rating input:checked ~ label{
    color:gold;
    text-shadow:0 0 15px gold;
}

.star-rating label:hover,
.star-rating label:hover ~ label{
    color:gold;
}

/* Flower Animation */
.flower{
    position:fixed;
    top:-50px;
    font-size:25px;
    animation: fall 5s linear infinite;
    z-index:9999;
}

@keyframes fall{
    0%{ transform:translateY(0) rotate(0deg); opacity:1; }
    100%{ transform:translateY(100vh) rotate(360deg); opacity:0; }
}

</style>

<div class="content">

<form method="POST">
    <button class="logout-btn" name="logout">Logout</button>
</form>

<br><br>

<div class="card">
<h2>Feedback</h2>

<form method="POST" id="feedbackForm">
<input type="text" name="name" placeholder="Your Name" required>
<textarea name="message" placeholder="Your Feedback" required></textarea>

<!-- ⭐ Star Rating -->
<div class="star-rating">
    <input type="radio" name="rating" value="5" id="5"><label for="5">★</label>
    <input type="radio" name="rating" value="4" id="4"><label for="4">★</label>
    <input type="radio" name="rating" value="3" id="3"><label for="3">★</label>
    <input type="radio" name="rating" value="2" id="2"><label for="2">★</label>
    <input type="radio" name="rating" value="1" id="1"><label for="1">★</label>
</div>

<br><br>
<button name="send">Submit</button>
</form>

</div>
</div>

<script>

/* 🌸 Flower Effect when 5 stars selected */
document.getElementById("5").addEventListener("click", function(){
    for(let i=0;i<30;i++){
        let flower=document.createElement("div");
        flower.className="flower";
        flower.innerHTML="🌸";
        flower.style.left=Math.random()*100+"vw";
        flower.style.animationDuration=(3+Math.random()*2)+"s";
        document.body.appendChild(flower);

        setTimeout(()=>{
            flower.remove();
        },5000);
    }
});

</script>
