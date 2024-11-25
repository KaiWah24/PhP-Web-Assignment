<?php
 session_start();
include 'helper1.php';
$selectAnnoucement = "SELECT * FROM annoucement";
$result = mysqli_query($dbc, $selectAnnoucement)
        
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
              <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >Event</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-toggle="tab" href="event2.php">View Events</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >Member</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-toggle="tab" href="profile.php">Profile</a>
              </div>
            </li>
          </ul>

          
        </div>
        </div>
        </nav>
  

 <!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="apex.png" style="max-width: 50%;">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="csgo.png" style="max-width: 50%;">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="valorant.png" style="max-width: 50%;">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="PUBG.jpg" style="max-width: 50%;">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="dota2.png" style="max-width: 50%;">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="wildrif.png" style="max-width: 50%;">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
    </div>
  </div>

  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">WE ARE KW E-SPORTS SOCIETY</h2>
    <p class="w3-justify">We’re moving away from the stereotype that all video games are extremely violent, and that all eSports players play first-person shooter games and battle arenas. While they are still very popular types of games in the industry, they’re far from being the only ones, and some new contenders are joining the fray. Of course, sports games like FIFA and NHL have been around for a long time, as have car racing games. Rocket League, for example, is a great game that marries soccer, cars, and rockets, making for a refreshing change, and deck-building games are also very popular, like Hearthstone. Mobile is also taking its rightful place in eSports, bringing with it a lot of variety as well.
 who am i too.</p>
  </div>
</div>

 
 <?php

    echo"<div class='container-fluid margin-left'>";
       
        echo"<div class='container' style='margin-right:200px;'>";
            echo"<hr>";
        echo"<span><h5>Annoucement</h5></span>";
          echo"<table class='table table-dark table-responsive table-striped table-bordered annoucement table-hover'>";
            echo"<thead>";
           echo" <tr style='color:white;'>";
              echo"<th class='bg-light'>Title</th>";
            echo"</tr>";
            echo"</thead>";
            
                
            echo"<tbody>";
            while($row = mysqli_fetch_array($result)){
                $ID = $row['id'];
                $tempTitle = $row['title'];

              echo"<tr>";
             echo"<td><li><a href='announcement.php?id=$ID'>$tempTitle</a></li></td>";
                
              echo"</tr>";
            }
            echo"</tbody>";
          echo"</table>";
        echo"</div>";
      echo"</div>";        
?>
 
  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h1 class="smallabout">We are not just community, but we are family</h1>
  </div>

<div class="w3-row-padding container ">
  <div class="w3-col l3 m6 w3-margin-bottom">
    <img src="fungpin2.png" alt="John" style="max-width: 80%;">
    <h3>Soong Fung Pin </h3>
    <p>"I am passionate about my work."
</p>
  </div>
  <div class="w3-col l3 m6 w3-margin-bottom">
    <img src="ck2.png" alt="Jane" style="max-width: 80%;">
    <h3>Ng Chin Khang</h3>
    <p>"I am ambitious and driven."
</p>
  </div>
  <div class="w3-col l3 m6 w3-margin-bottom">
    <img src="mk.jpeg" alt="Mike" style="max-width: 80%;">
    <h3>Yap Ming King</h3>
    <p>"I am highly organized."
</p>
  </div>
  <div class="w3-col l3 m6 w3-margin-bottom">
    <img src="kaiwah4.png" alt="Dan" style="max-width: 80%;">
    <h3>Wong Kai Wah</h3>
    <p>"I'm a people person."
</p>
  </div>
</div>






<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 3000);    
}
</script>
      

<div class="footer">
<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted" style="color:white;">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    
    
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5" >
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>KW E-sports gaming Society
          </h6>
          <p>
All rights reserved. No part of this publication may be reproduced, distributed, or transmitted in any form or by any means, including photocopying, recording, or other electronic or mechanical methods, without the prior written permission of the publisher, except in the case of brief quotations embodied in critical reviews and certain other noncommercial uses permitted by copyright law.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Games
          </h6>
          <p>
            <a href="event2.php" class="text-reset">Valorant</a>
          </p>
          <p>
            <a href="event2.php" class="text-reset">League of Legend</a>
          </p>
          <p>
            <a href="event2.php" class="text-reset">PUBG</a>
          </p>
          <p>
            <a href="event2.php" class="text-reset">League of Legend WildRift</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Quick Links
          </h6>
          <p>
            <a href="homepage.php" class="text-reset">Home</a>
          </p>
          <p>
            <a href="aboutus.php" class="text-reset">About Us</a>
          </p>
          <p>
            <a href="event2.php" class="text-reset">Events</a>
          </p>
          
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4"style="margin-left:15px;">Contact</h6>
          <p><i class="fas fa-home me-3"></i> TARUC Main Gate</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> +6012-601-4680</p>
          <p><i class="fas fa-print me-3"></i> +6012-601-4680</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2022 Copyright:
    <a class="text-reset fw-bold" href="#">KW Esports Society</a>
  </div>
  <!-- Copyright -->
</footer>   
<!-- Footer -->
</div>
</body>
</html>









