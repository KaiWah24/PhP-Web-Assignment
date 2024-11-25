<?php
include 'helper1.php';

$e1 = 'EVENT_NAME';
$e2 = 'GAME_NAME';
$e3 = 'event_VENUE';
$e4 = 'EVENT_DATE';
$e5 = 'PRICE_POOL';
$e6 = 'event_DESCRIPTION';

$l = $_GET['l'] ?? '';
$o = $_GET['o'] ?? '';

$sql = "SELECT EVENT_NAME, GAME_NAME, event_VENUE, EVENT_DATE,PRICE_POOL,event_DESCRIPTION FROM event";
$sql .= $l ? "WHERE GAME_NAME = '$l' " : "";
$sql .= $o ? "ORDER BY $o" : "";

$result = $dbc->query($sql);
?>
 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="event2.css">
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
         
    </head>

    <body>
            
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand"  href="homepage.php"><img class = "logo"src = "logo2.png" width="200px" ></a>
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
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >Events</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" data-toggle="tab" href="event2.php">View Events</a>
                </div>
              </li>
                </div>
              </li>
              <li class="nav-item">
              <form action="search.php" method="post" class="input-group" >
               <div class="form-outline">
                <input type="search" id="form1" class="form-control" placeholder="Event Name" aria-label="Search" name="search" />
              </div>
                    </form>
                 </li>
            </ul>
            
            
          </div>
        </div>
      </nav>

       <table class="table">
        <thead class="thead-light">
                <tr>
                    <th scope="col">Game Image</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Game Name</th>
                    <th scope="col">Venue</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Price Pool</th>
                    <th scope="col">Description</th>
                    <th scope="col">Register</th>
                </tr>
          </thead>
            <tbody>
            <form action="joinevent.php" method="POST">
    <?php
    while ($row = $result->fetch_assoc()) {
    $v = getVenue($row[$e3]);
    
    $imgName = $row[$e2].'.jpg';
    $imgName=str_replace(' ','', $imgName);

    echo "<tr><td><img src=".$imgName." /></td><td>$row[$e1]</td><td>$row[$e2]</td>" . "<td>$row[$e3]</td><td>$row[$e4]</td>" . "<td>$row[$e5]</td><td>$row[$e6]</td>"."<td><a href='joinevent.php?event=$row[$e1]' class='btn btn-danger'>Register</a></td></tr>";
    }   
    ?>

                </


            </tbody>
    </table>






    </body>
</html>

