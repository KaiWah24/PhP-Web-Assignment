<?php
$title ='List Event';
include 'helper.php';
include 'header.php';
?>
<style>
   table,td,th{
        min-width: 60%;
        background-color:rgb(0,0,0,0.76);
    }
    
    td,th{
        padding: 5px;
    }
    
    th{
        background-color: whitesmoke;
        color: black;
    }
</style>

<div class="margin-left">
    <h3 style="margin-left:50px; color: #66fcf1;">Esport event</h3>
    <hr>
    <a href="createEvent.php" style="margin-left:950px; margin-bottom: 10px; color:#66fcf1;" class="btn btn-secondary">Create Event</a><br>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Event names.." title="Type in a name" style="width: 72%; margin-left: 20px; border-radius: 10px; background-color: whitesmoke; padding:8px; color: black;">
    <i class="fa-solid fa-magnifying-glass" style="cursor: pointer;"></i>
</div>

<?php
$EC1 = 'EVENT_NAME';
$EC2 = 'GAME_NAME'; 
$EC3 = 'EVENT_DATE';

$sql = "SELECT EVENT_NAME, GAME_NAME, EVENT_DATE FROM event ";
$result = mysqli_query($dbc,$sql);
$count = mysqli_num_rows($result);

if ($count > 0 ){
 echo "<div class='margin-left' style='padding:10px'>";
 echo "<table id='myTable' class='table table-hover table-striped table-responsive' style='margin-top:5px; margin-left:5px;'>";
 echo "<thead>";
 echo "<tr><th style='width:45%; background-color: #45A29E; color: white;'>Event Name</th><th style='background-color: #45A29E; color: white;'>Game Name</th><th colspan='2' style='background-color: #45A29E; color: white;'>Event Date</th></tr>";
 echo "</thead>";

 while ($row = $result->fetch_assoc())
 {
     $url = urlencode($row[$EC1]);

  echo "<tr><td >$row[$EC1]</td><td>$row[$EC2]</td><td>$row[$EC3]</td>"
     . "<td><a href='editEvent.php?EVENT_NAME=$row[$EC1]' style='margin:5px;'>"
     . "<button class='btn btn-dark btn-sm' style='padding-left:15px; padding-right:15px;'>Edit</button>"
     . "</a><a href='deleteEvent.php?EVENT_NAME=$url'>"
     . "<button class='btn btn-danger btn-sm'>Delete</button></a></td></tr>"; 
 }
   echo "</table>";
   echo "</div>";
}
else {
    echo '<div class="container margin-left">';
     echo '<h5>No records are available..</h5>';
     echo '<script>displayNone();</script>';
}

  ?>



