<?php
$title = 'Edit Event';
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

<body>
    <h2 style="margin-left:200px; color: #66fcf1;" >Edit Event</h2>
    <hr>
    
    <div class="container-fluid createEvent" style="width:50%; border:2px solid #45A29E;background-color: #0b0c10; border-radius: 10px;color:whitesmoke; margin-right: 350px; margin-bottom: 10px; padding-left: 50px; padding-top: 10px;">
        <table cellpadding='5' style="color:#c5c6c7;">
        <form action="editSuccessful.php" method="post">
            <tr>
                <td>
                        <h3 style="color:#c5c6c7 ;">Event Details</h3>
                        <hr>
                </td>
            </tr>

            <!-- INSERT EVENT NAME -->
            <tr>
                <td>
                    Event Name:
                </td>
            </tr>
            <tr>
                <td>
                    <input typeq="text"  class="eventName" name="eventName" value="<?php echo "$eventName";?>"  disabled required style="width: 450px; padding:5px; border-radius: 10px; background-color: white; color: black;">
                    <input type="hidden"  name="NewName" value="<?php echo "$eventName";?>">
                </td>
            </tr>
            <!-- END EVENT NAME -->

            <!-- INSERT GAME NAME -->
            <tr>
                <td>
                    Game Name:
                </td>
            </tr>
            <tr>
                <td>

                    <select name="editGame" id="editGame" required style="width: 450px; padding:5px; border-radius: 10px; background-color: white; color: black;">
                         <?php
                        foreach (getGameList() as $v => $t) {
                        echo "<option value='$t'";
                        echo $t == $gameName ? "selected" : "";
                        echo ">$t</option>";
                         }
                        ?>   
                    </select>                    
                </td>
            </tr>
            <!-- END GAME NAME -->

            <!-- INSERT VENUE -->
            <tr>
                <td>
                    Venue:
                </td>
            </tr>
            <tr>
                <td>

                    <select name="editVenue" id="editVenue"  required style="width: 450px; padding:5px; border-radius: 10px; background-color: white; color: black;">
                        <?php
                        foreach (getVenueList() as $v => $t) {
                        echo "<option value='$t'";
                        echo $v == $venue ? "selected" : "";
                        echo ">$t</option>";
                         }
                        ?>      
                    </select>       
                </td>
            </tr>
            <!-- END VENUE -->  

            <!-- INSERT DATE -->
            <tr>
                <td>
                    Event Date
                </td>

            </tr>
            <tr>
                <td>
                    <input type="date" id="editDate" name="editDate" value="<?php echo "$eventDate";?>"
                           min="<?php echo date("Y-m-d");?>" required 
                           style="width: 150px; padding:5px; border-radius: 10px; background-color: white; color: black;"
                    > 
                </td>
            </tr>
            <!-- END DATE-->

            <!-- INSERT PRICE POOL -->
            <tr>
               <td>
                   Price Pool:
               </td>
            </tr>
            <tr>
               <td>
                   <input type="text" id="editPrice" name="editPrice" placeholder="RM" value="<?php echo "$pricePool";?>"required style="width: 150px; padding:5px; border-radius: 10px; background-color: white; color: black;">
               </td>
            </tr>
            <!-- END PRICE POOL -->

            <!-- INSERT DESCRIPTION -->
            <tr>
                <td>
                    Description
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <textarea id="editDescription" name="editDescription" rows="10" cols="50" required style="border-radius: 10px; background-color: white; color: black;"><?php echo "$description";?></textarea>
                    </div>
                </td>
            </tr>
            <!-- END DESCRIPTION-->  
            
            <tr>
                <td>
                    <input type='submit' class="btn btn-secondary" style="color: #66fcf1; margin-bottom: 10px;" value="Save">
                      </form>
                    <a href="listEvent.php"><button class="btn btn-secondary" style="color: #66fcf1; margin-bottom: 10px;">Cancel</button></a>
                </td>
                </tr>
            </table>
  
        

        
    </div>
</body>
</html>
    




