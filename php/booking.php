<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8e353a5380.js" crossorigin="anonymous"></script>
    <link href="sidenav.css" rel="stylesheet">
    <link href="booking.css" rel="stylesheet">
    <title>Booking</title>
    <link href="shareFont.css" rel="stylesheet">
    <script type="text/javascript" src="booking.js"></script>

    <?php
    //Connection to database
    include'helper.php';
    
    $q = "SELECT booking_id AS id, event_name AS eName, booking_date AS bDate, "
            . "teamName AS tName FROM booking";
    $run = mysqli_query($dbc,$q);
    $count = mysqli_num_rows($run);
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $p1 = $_POST['editP1'];
        $p2 = $_POST['editP2'];
        $p3 = $_POST['editP3'];
        $p4 = $_POST['editP4'];
        $p5 = $_POST['editP5'];
        $teamName = $_POST['editP0'];
        $update = "UPDATE TEAM SET PLAYER1NAME = ?,PLAYER2NAME =?,PLAYER3NAME =?,PLAYER4NAME = ?, PLAYER5NAME = ? WHERE TEAM.TEAMNAME = ?;";
        $stmt = $dbc->prepare($update);
        $stmt->bind_param('ssssss', $p1,$p2,$p3,$p4,$p5,$teamName);
        $stmt->execute();
        
    }
    

    ?>
    <style>
           body{ background-image:url(backg.jpg);}
    </style>
</head>
<body>
<?php
include 'sidenav.php';
?>

<h5 class="margin-left main">View booking</h5>
<hr>
  <div class="container main margin-left d-flex flex-column">
  <span id="searchIcon"><button class="btn btn-dark d-flex" id=""><i class="fa-solid fa-magnifying-glass" onclick="toShowBlock()"></i></button></span>
  <input type="text" id="myInput" class="form-control" style="padding-bottom: 5px; margin-bottom:5px; display:none;" onkeyup="myFunction()" placeholder="Search for booking no." title="Type in a name">
    
  <table id="myTable" class="table table-striped table-hover" style="background-color: rgb(21,21,21,0.85);">
     <?php
        if($count > 0){
            echo "<caption>$count result(s) displayed</caption>";
     ?>
     <thead>
        <tr>
            <th style="width: 25%;background-color: #45A29E;">Booking No.</th>
            <th style="width: 35%;background-color: #45A29E;">Event Name</th>
            <th style="width: 20%;background-color: #45A29E;">Date</th>
            <th style="width: 30%;background-color: #45A29E;">Team Name</th>
            <th colspan='2' style="width: 5%;background-color: #45A29E;">Edit</th>
        </tr>
      </thead>
        <?php
            while ($row = mysqli_fetch_array($run)){
                echo '<tr>';
                echo '<td>'.$row["id"].'</td>';
                echo '<td>'.$row["eName"].'</td>';
                echo '<td>'.$row["bDate"].'</td>';
                echo '<td>'.$row["tName"].'</td>';
                echo "<td><a href=updateTeam.php?id=".$row['id']."><button class='btn btn-dark btn-sm'>Edit</button></a></td>";
                echo '<td><a href=deleteTeam.php?delete='.$row["id"].'><button class="btn btn-danger btn-sm">Delete</button></a></td>';
                echo '</tr>';       
            }
        }
        else{
            echo '<h5>No records found</h5>';
        }
        ?>
  </table>

</div>
</body>
</html>