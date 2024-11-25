<?php
$title ='Delete Successful';
include 'helper.php';
include 'header.php';

    $event= $_GET['EVENT_NAME'];

    $sql = "SELECT * FROM event WHERE EVENT_NAME = '$event'";
    $run = mysqli_query($dbc,$sql);
        
    while ($row = mysqli_fetch_array($run)){
        $eventName = $row['event_name'];
        $gameName = $row['game_name'];
        $venue = $row['event_venue'];
        $eventDate = $row['event_date'];
        $pricePool = $row['price_pool'];
        $description = $row['event_description'];
    }
    
?> 

<html>
    <style>
        td{
            font-size: 150%;
            font-weight: 900;

        }
    </style>
    <body>
        <h2 style="color: #66fcf1; margin-left:200px;">Delete Successful</h2>
        <hr>
        
        <div class="container-fluid createEvent" style="width:50%; border: 1px solid #45A29E; background-color: #0b0c10; border-radius: 10px;color:whitesmoke; margin-right: 350px; margin-bottom: 10px; padding-bottom: 10px;">
        <table class='table table-hover table-responsive' cellpadding='5' style="color:#c5c6c7;">                
            <h3 style="color:#c5c6c7; padding-top: 15px;">Event Details</h3>
            <hr>
            <!-- INSERT EVENT NAME -->
            <tr>
                <td>
                    Event Name: <?php echo $eventName ?>
                </td>
            </tr>
            <!-- END EVENT NAME -->

            <!-- INSERT GAME NAME -->
            <tr>
                <td>
                    Game Name: <?php echo $gameName ?>
                </td>
            </tr>
            <!-- END GAME NAME -->

            <!-- INSERT VENUE -->
            <tr>
                <td>
                    Venue: <?php echo $venue ?>
                </td>
            </tr>
            <!-- END VENUE -->  

            <!-- INSERT DATE -->
            <tr>
                <td>
                    Event Date: <?php echo $eventDate ?>
                </td>

            </tr>
            <!-- END DATE-->

             <!-- INSERT PRICE POOL -->
            <tr>
                <td>
                    Price Pool: RM <?php echo $pricePool ?>
                </td>
            </tr>                 
            <!-- END PRICE POOL -->

            <!-- INSERT DESCRIPTION -->
            <tr>
                <td>
                    Description: <?php echo $description ?>
                </td>
            </tr>                   
            <!-- END DESCRIPTION-->  

            
    </table>
    </div>
    
    <div style='margin-left:530px; margin-top: 20px;'> 
        <a href="listEvent.php"><button class="btn btn-secondary" style="color: #66fcf1; margin-bottom: 10px;">Back to Menu</button></a>       
    </div>
    </body>
</html>

<?php

    $delete = "DELETE FROM event WHERE EVENT_NAME ='$eventName'";
    $stmt = $dbc->prepare($delete);
    $stmt->execute();
 ?>

