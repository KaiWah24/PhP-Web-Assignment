<?php
 session_start();
include 'helper1.php';

if (isset($_GET['id'])){
     $a_id = $_GET['id'];
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>KaiWah E-sports Society</title>
    <link href="homepage2.css" rel="stylesheet" />
    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/w3css/3/w3.css">
    <link rel="stylesheet" href="/css/shareFont.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand"  href="homepage.php"> <img class="img-fluid rounded-pill " src="logo2.png"  width="100px" >&nbsp;&nbsp;&nbsp;KW E-Sports Gaming Society</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link active" href="homepage.php">Home
          <span class="visually-hidden">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/html/aboutus.html">About Us</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >Events</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" data-toggle="tab" href="/html/event2.html">View Events</a>
          <a class="dropdown-item" data-toggle="tab" href="/html/profile.html">Booking History</a>
        </div>
      </li>
    </ul>
    <form class="d-flex">
      <input class="form-control me-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      <a href="/html/login.html" class="btn btn-primary" style="margin-left:10px;">Login</a>
  
    </form>
    
  </div>
  </div>
  </nav>


<?php
$a1='title';
$a2='content';
$a3='date';
$a4='admin_id';
$selectAnnoucement = "SELECT * from annoucement WHERE ID = '$a_id'";
$result = mysqli_query($dbc, $selectAnnoucement);

//$sql .= $t?"WHERE ID = '$getUid' ":"";
echo"<div class='container'>";
    while($row = mysqli_fetch_array($result)){
        echo"<div class='container-fluid p-5 bg-dark text-white text-center'>";
        echo ''.$row['title']."</span><td></tr>";
        echo "<tr><td><h6></h6><td><td><span>".$row['date']."</span><td></tr>";
        echo"</div>"; 
       
        echo"<div class='w3-container w3-content w3-center w3-padding-64' style='max-width:800px'";
        echo "<tr><td><h6>Content  </h6><td><td><span>".$row['content']."</span><td></tr>";
        echo"</div>";
        
        echo"<div class='w3-cell-bottom'";
        echo "<tr><td><h6>By  </h6><td><td><span>".$row['admin_id']."</span><td></tr>";
        echo"</div>";
        }
echo"</div>";
