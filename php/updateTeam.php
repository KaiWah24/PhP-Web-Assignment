<?php 
    include 'sidenav.php';
    include 'helper.php';
    $id = $_GET['id'];

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
        <title>Update team</title>
        <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
        <link href="sidenav.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <link href="shareFont.css" rel="stylesheet">
        <link href="updateTeam.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/8e353a5380.js" crossorigin="anonymous"></script>
        <script src="teamInfo.js"></script>
        
        <style>
            .wrapper{
                background-color:#0b0c10;
                border:5px solid #4EA7A3 !important;
                margin-top:150px;
                margin-left: 450px;
                padding-left: 250px;
                padding-bottom:50px;
                padding-top:50px;
                width:60%;
            }
            body{
                background-repeat:no-repeat;
                background-size:cover;
            }
        </style>
    </head>
<body>

    <div class="wrapper">
        <h3 id="top"><?php echo "Event $event_name <br> Team $team_name"?>  </h3>
        <hr>
        <form action="booking.php" METHOD="POST">
  <table id="myTable" class="table table-striped table-light table-hover table-responsive table-bordered" style="width:60%;">
            <tbody>
                <?php
                echo "<thead><tr><td style='background-color:#45A29E; color:white;'>Team name</td><td><input type='hidden' name='editP0' value='$team_name'><input type='text' value='$team_name'disabled></td></tr></thead>";
                echo "<tr><td>Player 1</td><td><input type='text' value='$p1' minlength='3' maxlength='12'name='editP1'></td></tr>";
                echo "<tr><td>Player 2</td><td><input type='text' value='$p2'minlength='3' maxlength='12' name='editP2'></td></tr>";
                echo "<tr><td>Player 3</td><td><input type='text' value='$p3'minlength='3' maxlength='12' name='editP3'></td></tr>";
                echo "<tr><td>Player 4</td><td><input type='text' value='$p4'minlength='3' maxlength='12' name='editP4'></td></tr>";
                echo "<tr><td>Player 5</td><td><input type='text' value='$p5'minlength='3' maxlength='12' name='editP5'></td></tr>";
                ?>
            </tbody>

        </table>
             <input type="submit" name="Update" value="Update" class="btn btn-secondary btn-sm" style="color:#66Fcf1;" onclick="return confirm('Are you sure?')">
             <button class="btn btn-secondary btn-sm" style="color:#66Fcf1;">Cancel</button>
        </FORM>

    </div>
</body>
</html>