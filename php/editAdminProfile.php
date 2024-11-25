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
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<h2 style="margin-left:200px; color: #66fcf1;">Admin Profile</h2>
<hr>
<form action="updateProfile.php" method="POST" enctype="multipart/form-data">
 <div class="container" style="margin-left:180px;">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="d-flex flex-column align-items-center" style="padding:40px;">

                        <img class="" width="300px" height="350px" id="output" src="uploads/<?php echo "$image"; ?>">
                        <input type="file" name="my_image" id="file"  onchange="loadFile(event)" style="display: none;" value="<?php echo "$image"; ?>">
                        <input type="hidden"  name="editImage" value="<?php echo "$image";?>">
                        <div class="chgImage rounded-circle" style="background-color: whitesmoke; padding: 5px 10px 5px 10px; margin-top: 10px; margin-bottom: 5px;">
                            <label for="file" style="cursor: pointer;">
                            <i class="fa-solid fa-camera-rotate"></i>
                            </label>                       
                        </div>
                        
                    
                    <span class="font-weight-bold" style="padding-top: 10px; margin-left: 100px;">
                        ID: <input type="text" name="editName" disabled value="<?php echo "$adminID"; ?>" 
                                   style="background-color:transparent; border-color: transparent;">
                            <input type="hidden"  name="ID" value="<?php echo "$adminID";?>">
                    </span>
                </div>
            </div>
            
            <div class="col-md-7 " >
                <table class='table table-hover table-responsive' cellpadding='5' style="color:#c5c6c7;">                
                    <h3 style="color:#45A29E; padding-top: 15px;">Personal Details</h3>
                    <hr>
                    
                    <tr>
                        <td>
                            NAME : <input type="text" name="editName" value="<?php echo "$name"; ?>" style="background-color: white; color: black; border-radius: 5px; width:50%;">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            NRIC No : <input type="text" name="editNRIC_No" value="<?php echo "$NRIC_No"; ?>" style="background-color: white; color: black; border-radius: 5px;">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Birthday: <input type="date" name="editBirthday" value="<?php echo "$birthday"; ?>" style="background-color: white; color: black; border-radius: 5px;">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            Gender :    <?php
                                            foreach (getGender() as $v => $t) {
                                                echo "<input type='radio' style='margin-left:10px;'"
                                                . "class='form-check-input' name='editGender' "
                                                . "value='$t' id='$v' ";
                                                echo $t == $gender ? "checked>" : ">";
                                                echo "<label for='$v' style='margin-left:10px;'>$t</label>";
                                            }
                                        ?>
                        </td>

                    </tr>
                    
                    <tr>
                        <td>
                            Email Address : <input type="email" name="editEmail" value="<?php echo "$email"; ?>" style="background-color: white; color: black; border-radius: 5px; width:50%;">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div>Address:</div>
                            <textarea id="address" name="editAddress" rows="3" cols="50" required style="border-radius: 5px;background-color: white; color: black; margin-left: 80px;"><?php echo "$address"; ?></textarea>
                        </td>
                    </tr>                           
                </table>
            </div>
        </div>
</div>

<div style="margin-left: 80%;">
    <input type="submit" class="btn btn-secondary" style="background-color:#555555; color:#66fcf1;" name="submit" value="Update">
</div>
</form>