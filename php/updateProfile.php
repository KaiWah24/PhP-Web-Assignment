<?php
$title = 'Admin Profile';
include 'helper.php';
include 'header.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['my_image']))
    {
        $NewID = ($_POST['ID']); 
        $NewName = ($_POST['editName']); 
        $NewNRIC_No = ($_POST['editNRIC_No']);
        $NewBirthday = ($_POST['editBirthday']);
        $NewGender = ($_POST['editGender']);
        $NewEmail = ($_POST['editEmail']);
        $Newaddress = ($_POST['editAddress']);
        $new_img_name = ($_POST['editImage']); 
        $image_name = $_FILES['my_image']['name'];
        $image_size  = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $img_ex = pathinfo($image_name,PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_ex = array("jpg","jpeg","png");
                        
            if(in_array($img_ex_lc, $allowed_ex))
            {
               $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
               $img_upload_path = 'uploads/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);
            }
            
            $update = "UPDATE admindetails SET ADMIN_NAME = ?, NRIC_NO = ?, BIRTHDAY = ?, GENDER = ?, EMAIL = ?, ADDRESS = ?, image_url = ? WHERE ADMIN_ID = ?";
            $stmt = $dbc->prepare($update);
            $stmt -> bind_param('ssssssss',$NewName,$NewNRIC_No,$NewBirthday,$NewGender,$NewEmail,$Newaddress,$new_img_name,$NewID);
            $stmt -> execute();
    }
else{
    echo "error";
}
?>
            
       
<h2 style="margin-left:200px; color: #66fcf1;">Update Successful</h2>
<hr>
 <div class="container" style="opacity:0.95; margin-left:180px;">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="d-flex flex-column align-items-center" style="padding:40px;">
                    <img class="" width="300px" height="350px" src="uploads/<?php echo "$new_img_name"; ?>">
                    <span class="font-weight-bold" style="padding-top: 10px;">ID: <?php echo "$NewID"; ?></span>
                </div>
            </div>
            
            <div class="col-md-7 " >
                <table class='table table-hover table-responsive' cellpadding='5' style="color:#c5c6c7;">                
                    <h3 style="color:#45A29E; padding-top: 15px;">Personal Details</h3>
                    <hr>
                    
                    <tr>
                        <td>
                            NAME : <?php echo "$NewName"; ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            NRIC No : <?php echo "$NewNRIC_No"; ?>
                    </tr>

                    <tr>
                        <td>
                            Birthday : <?php echo "$NewBirthday"; ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            Gender : <?php echo "$NewGender"; ?>
                        </td>

                    </tr>
                    
                    <tr>
                        <td>
                            Email Address : <?php echo "$NewEmail" ?>
                        </td
                    </tr>

                    <tr>
                        <td>
                            Address : <?php echo "$Newaddress" ?>
                        </td>
                    </tr>                           
                </table>
            </div>
        </div>
</div>

<div style="margin-left: 50%;">
       <?php echo "<a href='AdminProfile.php?ADMIN_ID=$NewID'><button class='btn btn-secondary' style='color: #66fcf1; margin-bottom: 10px;'>Back to Profile</button></a>";?>       
</div>

