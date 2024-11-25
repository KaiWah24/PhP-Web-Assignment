<?php
   include("helper1.php");
   session_start();
   $user = null;
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       
//////////////////////////////////////         member          //////////////////////////////////////////
        // username and password sent from member form 
        $id = $_POST['id'];
        $password = $_POST['pwd']; 

        $insert = "SELECT * FROM member WHERE StudentID=? and Password=?";
        $stmt = $dbc->prepare($insert);
        $stmt->bind_param('ss', $id, $password);
        $stmt->execute();

        $result = $stmt->get_result(); // get the mysqli result
        $user = $result->fetch_assoc(); // fetch data  

        // Close statement
        $dbc->close();
        
        if($user != null){  
                $_SESSION['id'] = $id;
                setcookie("id", $id, time()+1000, "/","", 0);
                // Redirect user to welcome page
                header("location: profile.php");
                }else{
                echo '<div class="alert alert-danger" role="alert"> <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  Incorrect Passwor Or Incorrect Student ID!
</div>';
            }
   }         
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.min.css">
        <script type="text/javascript" src="event.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
         <link rel="stylesheet" href="login.css">
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
                  <a class="dropdown-item" data-toggle="tab" href="event2.php">View Events</a>
                </div>
              </li>
            
              
            </ul>
            
            
          </div>
        </div>
      </nav>
        
       <div id="main">
        <div class="login">
            
            <button  class="button-49" ><a href="stafflogin.php" style="color:#f1f1f1; text-decoration: none;">Staff login</a></button><br><br>
           
            <button onclick="document.getElementById('id01').style.display='block'" style="width:100%; margin: auto;" class="button-49">Member login</button>
         </div>
         

        <div id="id01" class="modal">
  
          <form class="modal-content animate" action="" method="post">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
              <img src="logo.png" alt="Avatar" class="avatar">
            </div>
        
            <div class="container">
              <label for="id"><b>Student ID</b></label>
              <input type="text" placeholder="Enter Student ID" name="id" required>
        
              <label for="pwd"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="pwd" required>
                
              <button type="submit" class="button-59">Login</button>

              <div class="acc">
              <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
              </label>
              <a href="member.php">Create account?</a>
            </div>
            </div>
        
          </form>
        </div>
        
      </div>
        <script>
            // Get the modal
            var modal = document.getElementById('id01');
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            </script>

      
    </body>
</html>
