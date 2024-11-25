<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8e353a5380.js" crossorigin="anonymous"></script>
    <link href="sidenav.css" rel="stylesheet">
    <title>Booking</title>
    <link href="shareFont.css" rel="stylesheet">
    <script type="text/javascript" src="booking.js"></script>
    <?php
    include 'helper.php';
    $id = $_GET['delete'];

    $deletion = "DELETE FROM annoucement WHERE title = ?";

    $stmt = $dbc->prepare($deletion);
    $stmt ->bind_param('s',$id);
    $stmt ->execute();
    echo "<div class='container margin-left'><h5>Deleted Successfully</h5></div>";
    ?>
    </head>
    <body>
        <?php 
        include 'sidenav.php';
        ?>
        <div class='container margin-left'>
        <a href="annoucement.php"><button class="btn btn-secondary btn-sm" style="color:#66FCF1;">Back to announcement</button></a>
        </div>
        
    </body>
</html>
