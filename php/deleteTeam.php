<?php 
    include 'Connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       if ($stmt->execute()) {
        echo '<div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
         <h4 class="alert-success">Success!</h4>'
        . "<a href='booking.php' class='btn btn-primary'>Back to booking</a></div>";
        }
    }
    else {
    $id = $_GET['delete'];
    }
    $q = "SELECT * FROM BOOKING WHERE BOOKING_ID = $id";
    $run = mysqli_query($dbc,$q);
    $count = mysqli_num_rows($run);

    while ($row = mysqli_fetch_array($run)){
        $event_name = $row['event_name'];
        $team_name = $row['teamName'];
    }

    $q2 = 'SELECT player1Name, player2Name, player3Name, player4Name, player5Name FROM team where teamName = ?';
    $stmt = $dbc->prepare($q2);
    $stmt->bind_param('s',$team_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array(MYSQLI_ASSOC);
    
    $p1 = $row['player1Name'];
    $p2 = $row['player2Name'];
    $p3 = $row['player3Name'];
    $p4 = $row['player4Name'];
    $p5 = $row['player5Name'];
   
 ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete team</title>
        <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
        <link href="sidenav.css" rel="stylesheet">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <link href="teamInfo.css" rel="stylesheet">
        <link href="shareFont.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/8e353a5380.js" crossorigin="anonymous"></script>
        <script src="teamInfo.js"></script>

        <style>
            .wrapper{
                background-color: rgb(0,0,0,0.7);
                padding-bottom:20px;
                margin-left:200px;
                margin-right:auto;
                margin-top:50px;
            }
        </style>
    </head>
<body>
    <?php
    include 'sidenav.php';
    ?>
    <div class="container margin-left wrapper">
        <h3 id="top" style="color:#66fcf1;">
            <?php echo "Event name: $event_name <br> Team $team_name"?>  </h3>
            <h5 style="color :#45A29E;">Are you sure to delete this team?</h5>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <table class="table table-light table-hover table-responsive table-bordered">

                <?php
                echo '<thead class="table-dark">';
                echo "<tr><td>Team name</td><td>$team_name</td></tr><input type='hidden' name='team_name' value='<?=$team_name?>'>";
                echo '</thead><tbody>';
                echo "<tr><td>Player 1</td><td>$p1</td></tr>";
                echo "<tr><td>Player 2</td><td>$p2</td></tr>";
                echo "<tr><td>Player 3</td><td>$p3</td></tr>";
                echo "<tr><td>Player 4</td><td>$p4</td></tr>";
                echo "<tr><td>Player 5</td><td>$p5</td></tr>";                
                ?>
            </tbody>

        </table>
             <a href="deleteSuccess.php?success=<?=$id?>" class="btn btn-secondary" style="color:#66fcf1;">Confirm</a>
             <a href="booking.php" class="btn btn-secondary" style="color:#66fcf1;">Cancel</a>
        </form>
    </div>

</body>
</html>

