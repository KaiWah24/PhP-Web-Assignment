<?php

include 'helper1.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $id = trim($_POST['id']);
    $password = trim($_POST['pwd']);
    if (array_key_exists('gender', $_POST)) {
        $gender = $_POST['gender'];
    }
    $age = trim($_POST['age']);
    $program = $_POST['program'];

   if (empty($email)) {
        $error['email'] = 'Please Enter Email.';
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $error['email'] = 'Invalid Email Format.';
    }

    if (($age)<=0 || !preg_match("/^[0-9]+$/", $age)) {
        $error['age'] = 'Invalid Age.';
    }
    
    if (empty($name) || strlen($name) > 30) {
        $error['name'] = 'Please insert a name within 30 characters.';
    }
    //check gender is empty
    if (empty($gender)) {
        $error['gender'] = 'Please select a gender.';
    }
    //check gender is empty
    if (empty($program)) {
        $error['program'] = 'Please select a program.';
    }
    
     if (empty($password)) {
        $error['pwd'] = 'Please Enter Password.';
    }
    
     if (empty($age)) {
        $error['age'] = 'Please Enter Your Age.';
    }

    if (!empty($error)) {
        echo '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-heading">Warning!</h4>
  <ul>';
        foreach ($error as $e => $t) {
            echo"<li>$t</li>";
        }
        echo '</ul></div>';
    } else {
        $sql = "UPDATE member SET MemberName = ?, Email = ?, Password = ?, Gender = ?, Age = ?, Program = ?  WHERE StudentID = ?";
        $stmt = $dbc->prepare($sql);
        $stmt->bind_param('sssssss',$name,$email,$password,$gender,$age,$program,$id);
        if ($stmt->execute()) {
            echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-success">Success!</h4>';
            echo "Member <strong>$name</strong> has been updated.</div>";
           
        } else {
            echo '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-heading">Warning!</h4>
  <ul>';
            echo"<li>Database update error!</li>";
            echo '</ul></div>';
        }
    }
} else {
    $id = $_GET['id'] ?? '';

    $sql = "SELECT * FROM member WHERE StudentID = ?";
    $stmt = $dbc->prepare($sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['MemberName'];
        $gender = $row['Gender'];
        $program = $row['Program'];
        $age = $row['Age'];
        $email = $row['Email'];
        $password = $row['Password'];
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="edit.css">
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
         
    </head>
    
    <body>
     
      
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
   
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <div class="image">
						<img src="logo.png" alt="Admin" id="output" class="rounded-circle" width="150">
						<p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
						<p><label for="file" style="cursor: pointer;">Change Photo</label></p>
						<p><img id="output" width="200" /></p>
					  </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Email</label>
                            <input type="text" class="form-control" name="email" maxlength="30" value="<?= $email ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Member Name</label>
                                <input type="text" class="form-control" name="name" maxlength="30" value="<?= $name ?>">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Student ID</label><br><br>
                                <?= $id ?>
                                <input class="form-control"  type="hidden" name="id" value="<?= $id ?>" >
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Password</label>
                                <input type="text" class="form-control" name="pwd" maxlength="30" value="<?= $password ?>">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Gender</label><br><br>
                                <?php foreach (getGenderList() as $v => $t) {
                                    echo "<input type='radio' "
                                     . "class='form-check-input' name='gender' "
                                     . "value='$v' id='$v' ";
                                     echo $v == $gender ? "checked>" : ">";
                                        echo "<label for='$v'>$t</label>"; } ?>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                      
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Program</label>
                                <select name="program" class="form-select">
                        <option value=''>-- Select a program --</option>
                        <?php
                        foreach (getProgramList() as $v => $t) {
                        echo "<option value='$v'";
                        echo $v == $program ? "selected" : "";
                        echo ">$t</option>";
                        }
                        ?>                
                        </select>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Age</label>
                                <input type="text" class="form-control" name="age"  value="<?= $age ?>">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <input type="submit" class="btn btn-primary" value="Save Change">
                          <a href='profile.php' class='btn btn-danger' >Back</a>
                         </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>


                <script>
                var loadFile = function(event) {
                    var image = document.getElementById('output');
                    image.src = URL.createObjectURL(event.target.files[0]);
                };
                </script>
                
                

    </body>
</html>

