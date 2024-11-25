 <?php
session_start();
require_once 'connection.php';

if (isset($_POST['uname']) && isset($_POST['password'])) {
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);    
    
    if (empty($uname)) {
        header("Location: stafflogin.php?error=Username is missing");
        exit();
    } else {
        if (empty($password)) {
            header("Location: stafflogin.php?error=Password is missing");
            exit();
        } else {
            $sql = "SELECT admin_id, password FROM admindetails
                WHERE ADMIN_ID = '".$uname."' AND PASSWORD = '".$password."'limit 1";
            
            if(password_verify($password, $hashed_password)){
                $result = mysqli_query($dbc, $sql);
                var_dump($result);
            }
                    if (mysqli_num_rows($result)) {
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['username'] = $row['admin_id'];
                        header("Location: indexstaff.php");
                    } else {    
                        header("Location: stafflogin.php?error=Incorrect username or password");
                        exit();
                        }
        }
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta http-equiv="Location" content="indexstaff.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css
    " rel="stylesheet">
    <link href="stafflogin.css" rel="stylesheet">
    <title>Admin login</title>
    
   
</head>
<body style="background-image:url(xd.jpg); background-size:cover; background-repeat:no-repeat; background-position:center; height:100%;">
    
    <div class="wrapper" style="margin-top: 100px;">
        <div class="container header">
            <h3 class="d-flex justify-content-center">KW Esports Society Admin Login</h3>
        </div>

        <div class="d-flex big flex-column main-box form-group loginbox">
            <?php if(isset($_GET['error'])){
                echo "<p class='error'>".$_GET['error']."</p>";
            }?>
            <p class="d-flex justify-content-center sign">Sign in to start your session</p>
            <form action="" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control input-sm" name="uname" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control input-sm" name="password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="form-control btn btn-sm btn-secondary">Login</button>
            <a href="forgotPassword.php">Forgot password?</a>
            </form>
        </div>
    </div>
</body>
</html>