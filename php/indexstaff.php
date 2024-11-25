<?php 
include 'adminhelper.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin webpage</title>

    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
    <link href="indexstaff.css" rel="stylesheet">
    <link href="sidenav.css" rel="stylesheet">
    <link href="shareFont.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="indexstaff.js"></script>
    <script src="https://kit.fontawesome.com/8e353a5380.js" crossorigin="anonymous"></script>
    
    <?php 
    $eventarray = array();

    $q = "SELECT game_name,event_date,price_pool,event_venue FROM event;";
    $run = mysqli_query($dbc, $q);
    $count = mysqli_num_rows($run);
    $i = 0;

?>
    <style>
        body{
                background-image:url(backg.jpg);
        }
    </style>
</head>

<body>
    <?php
        include 'sidenav.php';
    ?>
  <div> 
    <div class="news" style="width:130%"> 
    <marquee class="news-content"> 
      <p>Welcome Student <?=$admin_id?>, today date is <?= date("Y-m-d");?></p>
    </marquee> 
    </div>
 </div>
      
      <div class="container-fluid d-flex justify-content-center caro-wrap">
      <div id="caro" class="carousel slide" data-bs-ride="carousel">
        
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="caro-1.jpg" class="img-fluid" alt="ValorantTournament">
          </div>
          <div class="carousel-item">
              <img src="caro-2.jpg"  class="img-fluid" alt="PUBGTournament">
          </div>
          <div class="carousel-item">
              <img src="caro-3.jpg"  class="img-fluid" alt="MobileLegendTournament">
          </div>
        </div>
      </div>
    </div>
      <hr>

      <div class="container margin-left event_wrap">
        <h5>Events</h5>
          <div class="container wrap d-flex">
            <?php 
            $counter = 1;
            $limit = 1;
             while ($row = mysqli_fetch_array($run)){
                 
                 if($limit > 5){
                     break;

                 }
                 $limit++;
                  if ($counter > 3){
                    echo '</div><div class="container wrap d-flex">';
                      $counter = 1;
                  }
                 echo "<div class='container ongoing-event' id='{$row['game_name']}'>";
                 echo '<table class="table ongoing-event-'.$counter.'">';
                 echo '<tbody>';
                    echo '<tr rowspan="2">';
                    echo ' <td id="t1_game">Game name: '.$row["game_name"].'</td>';
                    echo ' <td id="t1_date">Event_date: '.$row['event_date'].'</td></tr>';
                    echo '<td></td><td id="t1_date">Price pool: RM '.$row['price_pool'].'</td>';
                  echo '<tr>
                    <td id="t1_venue">Venue: '.$row['event_venue'].'</td>
                    </tr>';
                  echo '</tbody>';
                  echo '</table>';
                  echo '<a href="listevent.php"><button class="bg-info button"><span>View more</span></button></a>
                    </div>';

                  $counter++;


             }

            ?>
          </div>
      </div>
      <footer>
        <hr>
        <div class="container-fluid margin-left d-flex" style="padding-top:10px;">
            <div class="container">
                <h5>Sponsored by:</h5>
                <span class="redbull"><img class="rounded-pill" src="redbull.png"></span>
                <span class="redbull"><img class="rounded-pill" src="logitech.jpg"></span>
                <span class="redbull"><img class="rounded-pill" src="razer.png"></span>
                <span class="redbull"><img class="rounded-pill" src="asus.png"></span>
            </div>
    
          <div class="container">
            <form>
              <h5>Subscribe to our newsletter</h5>
              <p>Monthly digest of whats new and exciting from us.</p>
              <div class="d-flex w-50 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn btn-primary" type="button" onclick="alert('You have successfully subscribed')">Subscribe</button>
              </div>
            </form>
          </div>
        </div>
    
        <div class="d-flex margin-left py-6 mt-5 border-top">
            <p style="right:0px;">© 2021 Company, Inc. All rights reserved.</p>
          </div>
    
      </footer>
        </div>
</body>
</html>
