<?php 
    include 'helper1.php';
// Check connection
    session_start();
if (isset($_SESSION['id'])){
    $id= ($_SESSION['id']);
    
} else{
    header("Location: login.php");
}
if ($dbc->connect_error) {
    die("Connection failed: "
        . $dbc->connect_error);
}


//Process form data when form is submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $tdydate = date("Y-m-d");
    $team_name =$_POST['team_name'];
    $email_address =trim($_POST['email_address']);
    $phone_number =trim($_POST['phone_number']);
    $player1_name =$_POST['player1_name'];
    $player2_name =$_POST['player2_name'];
    $player3_name =$_POST['player3_name'];
    $player4_name =$_POST['player4_name'];
    $player5_name =$_POST['player5_name'];
    $p1_ic =$_POST['p1_ic'];
    $p2_ic =$_POST['p2_ic'];
    $p3_ic =$_POST['p3_ic'];
    $p4_ic =$_POST['p4_ic'];
    $p5_ic =$_POST['p5_ic'];
    $event = $_POST['event_name'];
    $student_id = $_POST['student_id'];
    $game_name = $_POST['game_name'];
    
        if (empty($team_name)) {
        $error['team_name'] = 'Team Name is Required.';
        }
        
        if (empty($email_address)) {
        $error['email_address'] = 'Email Address is Required.';
        }
        
        if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        $error= "Invalid email format";
        }
        
        if (empty($phone_number)) {
        $error['phone_number'] = 'Phone Number is Required.';
        }
        
        if(!preg_match('/^01\d-\d{7}$/', $phone_number)) {
        $error['phone_number'] = 'Your <strong>mobile phone</strong> number is invalid. Format: 999-9999999 and starts with 01.';
        }
        
        if (empty($player1_name)) 
        {
        $error['player1_name'] = 'Player Name is Required';
        }
        else if (strlen($player1_name) > 30)
        {
        $error['player1_name'] = 'Your <strong>name</strong> is too long. It must be less than 30 characters.';
        }
        
        
        if (empty($player2_name)) {
        $error['player2_name'] = 'Player Name is Required';
        }
        else if (strlen($player1_name) > 30)
        {
        $error['player2_name'] = 'Your <strong>name</strong> is too long. It must be less than 30 characters.';
        }
     
        
        if (empty($player3_name)) {
        $error['player3_name'] = 'Player Name is Required';
        }
        else if (strlen($player1_name) > 30)
        {
        $error['player3_name'] = 'Your <strong>name</strong> is too long. It must be less than 30 characters.';
        }
        
        
        if (empty($player4_name)) {
        $error['player4_name'] = 'Player Name is Required';
        }
        else if (strlen($player1_name) > 30)
        {
        $error['player4_name'] = 'Your <strong>name</strong> is too long. It must be less than 30 characters.';
        }
        
        
        if (empty($player5_name)) {
        $error['player5_name'] = 'Player Name is Required';
        }  
        else if (strlen($player1_name) > 30)
        {
        $error['player5_name'] = 'Your <strong>name</strong> is too long. It must be less than 30 characters.';
        }
        
        
        if (!empty ($error)) {
        echo '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-heading">Warning!</h4>
  <ul>';
        foreach ($error as $e => $t) {
            echo"<li>$t</li>";
        }
        echo '</ul></div>';
    }
    
    else{
        //Insert Statement
        $insertStatement="INSERT INTO team (teamName, emailAddress, phoneNumber, player1Name, player2Name, player3Name, player4Name, player5Name, player1IC, player2IC, player3IC, player4IC, player5IC,studentID,game_name) VALUES ('$team_name','$email_address','$phone_number','$player1_name','$player2_name','$player3_name','$player4_name','$player5_name','$p1_ic','$p2_ic','$p3_ic','$p4_ic','$p5_ic','$student_id','$game_name')";
        $insertBooking = "INSERT INTO `booking`(`event_name`, `booking_date`, `teamName`) VALUES (?,?,?)";
        
        if(!(mysqli_query($dbc, $insertStatement))){
           echo mysqli_error($dbc);
        }
        
        $stmt = $dbc->prepare($insertBooking);
        $stmt->bind_param("sss",$event,$tdydate,$team_name);
        
        if(!($stmt->execute())){
            echo mysqli_error($dbc);
        }
                
        else{
        header("Location:complete.php");
        }
     }
}


if (isset($_GET)){
    $event_name = $_GET['event'];
    
    $sql = "SELECT event_name,game_name FROM EVENT WHERE EVENT_NAME = '$event_name'";
    $run = mysqli_query($dbc,$sql);
    
    while($row = mysqli_fetch_array($run)){
        $game = $row['game_name'];
    }
}

             
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <title>KaiWah E-sports Society</title>
    <link href="joinevent.css" rel="stylesheet" />
    <link rel="stylesheet" href="shareFont.css">
    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
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
                <a class="dropdown-item" data-toggle="tab" href="profile.php">View Member Profile</a>
              </div>
            </li>
          </ul>

          
        </div>
        </div>
        </nav>

      <div class="container">
        <div class="form">
          <div class="h3">Registration Form</div>
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="form1">
            <table class="table table-bordered">
                 
                <div class="form-group col-md-12-">
		 <label for="StudentID">Student ID</label>
                     <input type="text" disabled class="form-control"  placeholder="" value="<?=$id?>">  
                    <input type="hidden" name="student_id" class="form-control"  placeholder="" value="<?=$id?>"> 
					
                  <label for="EventName">Event Name</label>
                  <input type="text" disabled class="form-control" value="<?=$event_name?>"  placeholder="">
                  <input type="hidden" value="<?=$event_name?>" name="event_name">
                </div>   
                
                <tr>
                <td><label>Team Name</label>
                <input type="text" name="team_name"  class="form-control" required  maxlength="30"></td>
                <td><label>Email (Only leader required)</label>
                <input type="email" name="email_address" class="form-control" required></td>
                <td><label>Phone Number (Only leader required)</label> <input type="tel" name="phone_number"class="form-control" required maxlength="12" placeholder="012-3456789"></td>
                </tr>

                <tr>
                <td><label>Player Name #1 (Leader) </label>
                <input type="text" name="player1_name"class="form-control" required maxlength="30"></td>
                <td><label>Identity Card Number</label>
                <input type="text" name="p1_ic" class="form-control" required maxlength="30"></td>
                <td><label>Player In Game Name #1</label> <input type="text" class="form-control" required maxlength="30"></td>
                </tr>
                
                <tr>
                    <td><label>Player Name #2 </label>
                    <input type="text" name="player2_name"class="form-control" required maxlength="30" ></td>
                    <td><label>Identity Card Number</label>
                    <input type="text" name="p2_ic" class="form-control" required maxlength="30"></td>
                    <td><label>Player In Game Name #2</label> <input type="text" class="form-control" required maxlength="30"></td>
                </tr>
                
                <tr>
                    <td><label>Player Name #3 </label>
                    <input type="text"name="player3_name" class="form-control" required maxlength="30"></td>
                    <td><label>Identity Card Number</label>
                    <input type="text" name="p3_ic" class="form-control" required maxlength="30"></td>
                    <td><label>Player In Game Name #3</label> <input type="text" class="form-control" required maxlength="30"></td>
                </tr>

                <tr>
                    <td><label>Player Name #4 </label>
                    <input type="text" name="player4_name"class="form-control" required maxlength="30"></td>
                    <td><label>Identity Card Number</label>
                    <input type="text" name="p4_ic" class="form-control" required maxlength="30"></td>
                    <td><label>Player In Game Name #4</label> <input type="text" class="form-control" required maxlength="30"></td>
                </tr>
                
                 <tr>
                    <td><label>Player Name #5 </label>
                    <input type="text" name="player5_name" class="form-control" required maxlength="30"></td>
                    <td><label>Identity Card Number</label>
                    <input type="text" name="p5_ic" class="form-control" required maxlength="30"></td>
                    <td><label>Player In Game Name #5</label> <input type="text" class="form-control" required maxlength="30"></td>
                </tr>
                
                <tr>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Game name</label>
                    <input type="text" disabled id="exampleFormControlSelect1" class="form-control" value="<?=$game?>">
                    <input type="hidden" name="game_name" value="<?=$game?>">
                 </div>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-success" type="submit" value="Submit" name="submit" style="font-size:15px;" />
                  </td>
                </tr>
            </table>
        </form>
        </div>
      </div>







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
    
    






