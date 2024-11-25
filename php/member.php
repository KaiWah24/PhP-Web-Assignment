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

    //check ID pattern
    $pattern = "/\d\d[A-Z]{3}[0-9]{5}/";
    if (!preg_match($pattern, $id)) {
        $error['id'] = 'ID Pattern Unmatched';
    }
    // check ID repeated
    $sql = "SELECT * FROM member WHERE StudentID = ?";
    $stmt = $dbc->prepare($sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $error['id'] = 'ID repeated';
    }
    
    if (empty($email)) {
        $error['email'] = 'Please Enter Email.';
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $error['email'] = 'Invalid Email Format.';
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
     if (($age)<=0 || !preg_match("/^[0-9]+$/", $age)) {
        $error['age'] = 'Invalid Age.';
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
        $sql = "INSERT INTO member (MemberName, Email, StudentID, Password,Gender,Age,Program) VALUES (?,?,?,?,?,?,?)";
        $stmt = $dbc->prepare($sql);
        $stmt->bind_param('sssssss',$name,$email,$id,$password,$gender,$age,$program);
        $result = $stmt->execute();
        echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <h4 class="alert-success">Success!</h4>';
        echo "<strong>$name</strong> you has created your account.</div>";
       
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://bootswatch.com/5/cyborg/bootstrap.min.css">
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
         <link rel="stylesheet" href="member.css">
         <link rel="stylesheet" href="/css/shareFont.css">
    </head>
    
    <body>
       
            
            
          </div>
        </div>
      </nav>
        
       <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <table cellpadding='5'>
                   
                <tr>
                       <td >
                            Name
                       </td>
                   </tr>
                   
                   <tr>
                       <td>
                                 <input type="text" name="name" placeholder="CKK" required >
                       </td>
                   </tr>
                <tr>
                       <td >
                            Email
                       </td>
                   </tr>
                   
                   <tr>
                       <td>
                                 <input type="text" name="email" placeholder="abc123@gmail.com"required>
                       </td>
                   </tr>
                   <tr>
                       <td >
                            Student ID
                       </td>
                   </tr>
                   
                   <tr>
                       <td>
                                 <input type="text" name="id" placeholder="20WMD01889"required>
                       </td>
                   </tr>
                   
                   <tr>
                       <td >
                            Password
                       </td>
                   </tr>
                   
                   <tr>
                       <td>
                             <input type="password"  name="pwd" required>
                       </td>
                   </tr>

                   <tr>
                    <td >
                         Gender
                    </td>
                </tr>
                
                <tr>
                    <td>
                          <?php
                $g = getGenderList();
                foreach ($g as $v => $t) {
                    echo "<input type='radio' class='form-check-input' name='gender' value='$v' id='$v'>"
                    . "<label for='$v'>$t</label>";
                }
                ?>
                    </td>
                </tr>

                <tr>
                    <td >
                         Age
                    </td>
                </tr>
                
                <tr>
                    <td>
                          <input type="text"  name="age" placeholder="12"required>
                    </td>
                </tr>

                <tr>
                    <td >
                         Program
                    </td>
                </tr>
                
                <tr>
                     <td><select name="program" class="form-select">
                    <option value=''>-- Select a program --</option>
                    <?php
                    $p = getProgramList();
                    foreach ($p as $v => $t) {
                        echo "<option value='$v'>$t</option>";
                    }
                    ?>    
                    </td>
                </select>
                </tr>
                   
                   <tr>
                       <td>
                            
                        <label>
                          <input type="checkbox" name="remember"> Remember me
                         </label>
                
                       </td>
                   </tr>

                   <tr>
                        <td>
                        <span class="signup">By creating an account, you agree to wah kai kai esport <a href="#">Terms of Use</a> &  <a href="#">Privacy Policy</a>
                        </td>
                </tr>
                   
                   <tr>
                       <td>
                           <button type="submit" class="button-23" value="Insert">Sign up</button>
                       </td>
                       
                   </tr>
                   <tr>
                       <td>
                         <a href='login.php' class='btn btn-danger' >Back</a>
                       </td>
                       
                   </tr>
           
       </form>
          
    
    </body>
</html>
