<?php
$title = 'Admin Profile';
include 'header.php';
include 'helper.php';
    $sql = "SELECT * FROM admindetails WHERE ADMIN_ID = '$admin_id'";
    $run = mysqli_query($dbc,$sql);
        
    while ($row = mysqli_fetch_array($run)){
        $adminID = $row['ADMIN_ID'];
        $name = $row['ADMIN_NAME'];
        $NRIC_No = $row['NRIC_NO'];
        $birthday = $row['BIRTHDAY'];
        $gender = $row['GENDER']; 
        $email = $row['EMAIL'];
        $address = $row['ADDRESS'];
        $image =$row['image_url'];
    }
?>
<h2 style="margin-left:200px; color: #66fcf1;">Admin Profile</h2>
<hr>
 <div class="container" style="opacity:0.95; margin-left:180px;">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="d-flex flex-column align-items-center" style="padding:40px;">
                    <img class="" width="300px" height="350px" src="uploads/<?php echo "$image"; ?>">
                    <span class="font-weight-bold" style="padding-top: 10px;">ID: <?php echo "$adminID"; ?></span>
                </div>
            </div>
            
            <div class="col-md-7 " >
                <table class='table table-hover table-responsive' cellpadding='5' style="color:#c5c6c7;">                
                    <h3 style="color:#45A29E; padding-top: 15px;">Personal Details</h3>
                    <hr>
                    
                    <tr>
                        <td>
                            NAME : <?php echo "$name"; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            NRIC No : <?php echo "$NRIC_No"; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Birthday: <?php echo "$birthday"; ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            Gender : <?php echo "$gender"; ?>
                        </td>

                    </tr>
                    
                    <tr>
                        <td>
                            Email Address : <?php echo "$email"; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Address: <?php echo "$address"; ?>
                        </td>
                    </tr> 
                </table>
            </div>
        </div>
</div>     
<div style="margin-left: 80%;">
       <?php echo "<a href='editAdminProfile.php?ADMIN_ID=$admin_id'><button class='btn btn-secondary' style='color: #66fcf1; margin-bottom: 10px;'>Edit</button></a>";?>       
</div>

