<?php
include 'helper1.php';

session_start();
if (isset($_SESSION['id'])){
    $id= ($_SESSION['id']);
    
} else{
    header("Location: login.php");
}
 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.min.css">
         <link rel="stylesheet" href="profile_1.css">
         <script type="text/javascript" src="/js/event.js" defer></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    </head>
    
    <body> 
        <?php
$c1='MemberName';
$c2='Email';
$c3='StudentID';
$c4='Password';
$c5='Gender';
$c6='Age';
$c7='Program';



$p = $_GET['p']??'';
$o = $_GET['o']??'';

$sql = "SELECT MemberName, Email, StudentID, Password, Gender, Age, Program FROM member WHERE StudentID='$id'";
$sql .= $p?"WHERE Program = '$p' ":"";
$sql .= $o?"ORDER BY $o":"";

$result = $dbc->query($sql);
5
?>
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
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >Events</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" data-toggle="tab" href="event2.php">View Events</a>
        </div>
      </li>
      </li>
      <li class="nav-item">
               <a class="nav-link" href="logout.php">Logout</a>
              </li>
    </ul>
  
      </nav>
           
           
         <div id="profile">
                   <div class="image">
                    <img src="logo2.png" alt="Admin" id="output" class="rounded-circle" width="150">
                    <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                    <p><label for="file" style="cursor: pointer;">Change Photo</label></p>
                    <p><img id="output" width="200" /></p>
                    </div>
                    
             
                    <div class="inform">
                        <?php
              while ($row = $result->fetch_assoc()){
                   $g = getGender($row[$c5]);
                  $p = getProgram($row[$c7]);
                        echo"<hr>";
                       echo"<p style='margin-bottom:5px;'>Member Name</p> <p>($row[$c1])</p>";echo"<hr>";
                       echo"<p style='margin-bottom:5px;'>Email</p> <p>($row[$c2])</p>";echo"<hr>";
                       echo"<p style='margin-bottom:5px;'>Student ID</p> <p>($row[$c3])</p>";echo"<hr>";
                       echo"<p style='margin-bottom:5px;'>Password</p> <p>($row[$c4])</p>";echo"<hr>";
                       echo"<p style='margin-bottom:5px;'>Gender</p> <p>($g)</p>";echo"<hr>";
                       echo"<p style='margin-bottom:5px;'>Age</p> <p>($row[$c6])</p>";echo"<hr>";
                       echo"<p style='margin-bottom:5px;'>Program</p> <p>($p)</p>";echo"<hr>";
                       
                       
                     echo"<a href='edit_profile.php?id=$row[$c3]' class='btn btn-secondary' style='background-color:wthite; width:15%; height:30%; margin-bottom: 20px;'>Edit</a>";
              } 
              ?>
                </div>
             
        </div>


        <div class="container">
                          <blockquote class="blockquote text-center">
                        <p class="mb-0" style="color:white">Tournament History</p>
                        </blockquote>           
                    <?php
                    $selectTeam = "SELECT * FROM team WHERE studentID = ?";
                    $stmt = $dbc->prepare($selectTeam);
                    $stmt->bind_param('s',$id);
                    $stmt->execute();
                    $results = $stmt->get_result();
                    
                    
                   if ($results->num_rows > 0) {
                         echo "<table class='table table-secondary table-bordered '><tr><th>Team Name</th><th>Game Participate</th><th>Email Address</th><th>Phone Number</th></tr>";
                   while($row2 = $results->fetch_array(MYSQLI_ASSOC)){
//                            // output data of each row {
                              echo "<tr><td>" . $row2['teamName']."</td><td>".$row2['game_name']."<td>" . $row2['emailAddress']. "</td><td>" . $row2['phoneNumber']. "</td></tr>";
                            echo "</table>";
                            }
                             }
                            else {
                           echo "0 results";
                          }
                  

                    
//                    if ($result2){
//                    if ($result2->num_rows > 0) {
//                            // output data of each row
//                            while($row2 = $result2->fetch_assoc()) {
//                              echo "<tr><td>" . $row2['teamName']."</td><td>".$row2['gameOption']."<td>" . $row2['emailAddress']. "</td><td>" . $row2['phoneNumber']. "</td></tr>";
//                            }
//                            echo "</table>";
//                            } else {
//                            echo "0 results";
//                          }
//                           }
//                           else
//                          {
//                          echo "Error in ".$selectTeam."<br>".$dbc->error;
//                          }
                   
                   

                          
                ?>
</div>


                <script>
                    var loadFile = function(event) {
                        var image = document.getElementById('output');
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };
                    </script>
        
    </body>
</html>