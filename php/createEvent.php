<?php
$title = 'Create Event';
include 'header.php';
include 'helper.php';
?>
    <h2 style="margin-left:200px; color: #66fcf1;" >Create Event</h2>
    <hr> 
    <div class="container-fluid createEvent" style="width:50%; border:2px solid #45A29E;background-color: #0b0c10; border-radius: 10px;color:whitesmoke; margin-right: 350px; margin-bottom: 10px; padding-left: 50px; padding-top: 10px;">
     
        <table cellpadding='5' style="color:#c5c6c7;">
            <form action="createSuccessful.php" method="post" >
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
                            <input type="text"  class="eventName" name="eventName" placeholder="Enter event name" maxlength="60" required style="width: 450px; padding:10px; border-radius: 10px; background-color: white; color: black;">
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
                            <select name="gameName" id="gameName" required style="width: 450px; padding:5px; border-radius: 10px; background-color: white; color:black;">
                                <option style="display:none"></option>
                                <?php
                                $g = getGameList();
                                foreach ($g as $v => $t) {
                                    echo "<option value='$t'>$t</option>";
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
                            <select name="venue" id="venue" required style="width: 450px; padding:5px; border-radius: 10px;background-color: white; color: black;">
                                <option style="display:none"></option>
                                   <?php
                                   $v = getVenueList();
                                   foreach ($v as $a => $t) {
                                        echo "<option value='$t'>$t</option>";
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
                            
                            <input type="date" id="eventDate" name="eventDate" 
                                   min="<?php echo date("Y-m-d");?>" required 
                                   style="width: 150px; padding:5px; border-radius: 10px; background-color: white; color: black;"
                            > 

                                
                        </td>
                    </tr>
                    <!-- END DATE-->

                     <!-- INSERT PRICE POOL -->
                    <tr>
                        <td>
                            Price Pool
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="pricePool" name="pricePool" placeholder="RM"  required style="width: 150px; padding:5px; border-radius: 10px; background-color: white; color: black;">
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
                                <textarea id="description" name="description" rows="10" cols="50" maxlength="300" required style="border-radius: 10px;background-color: white; color: black;"></textarea>
                            </div>
                        </td>
                    </tr>
                    <!-- END DESCRIPTION-->  
                    <tr>
                    
                        <td>
                            <input type='submit' value="Create" class="btn btn-secondary" style="color: #66fcf1; margin-bottom: 10px;">
                            </form>
                            <a href="listEvent.php"><button class="btn btn-secondary" style="color: #66fcf1; margin-bottom: 10px;">Cancel</button></a>
                        </td>
                    </tr>
                    
            
    </table>


        
    </div>
</body>

</html>