<?php

$search = $_POST['search'];

include 'helper1.php';

$e1 = 'event_name';
$e2 = 'game_name';
$e4 = 'event_date';
$e3 = 'event_venue';
$e5 = 'price_pool';
$e6 = 'event_description';


$sql = "SELECT * FROM event WHERE game_name like '%$search%'";

$result = $dbc->query($sql);

$dbc->close();

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
          <a class="navbar-brand"  href="#"><img class = "logo"src = "logo.png" width="200px" ></a>
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
                  <a class="dropdown-item" data-toggle="tab" href="#">View Events</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >Login</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" data-toggle="tab" href="login.php">Member</a>
                  <a class="dropdown-item" data-toggle="tab" href="stafflogin.php">Staff</a>
                </div>
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

    <?php
    if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
    $imgName = $row[$e2].'.jpg';
    $imgName=str_replace(' ','', $imgName);

	echo "<tr><td><img src=".$imgName." /></td><td>$row[$e1]</td><td>$row[$e2]</td>" . "<td>$row[$e3]</td><td>$row[$e4]</td>" . "<td>$row[$e5]</td><td>$row[$e6]</td>"."<td><a href='joinevent.php' class='btn btn-danger'>Register</a></td></tr>";
}
} else {
	echo "0 records";
}
    ?>



            </tbody>
    </table>






    </body>
</html>
