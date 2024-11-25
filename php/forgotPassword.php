<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css
    " rel="stylesheet">
    <link href="stafflogin.css" rel="stylesheet">
    <title>Admin login</title>
        <script>
        function backToLogin() {
            alert("Email sent successfully, please check email witihn 5-10 mins");
        }
        </script>
    <?php
       if ($_SERVER["REQUEST_METHOD"] == "POST"){
           echo "<script> backToLogin(); </script>";
       }
    ?>
    <style>
        .loginbox{
            border-radius: 0.75rem;
        }
    </style>

</head>
<body style="background-image:url(xd.jpg);">

    <div class="wrapper" style="margin-top: 80px;">
        <div class="d-flex big flex-column main-box form-group loginbox">
            <h3 class="d-flex justify-content-center">Enter your user account's verified email address and we will send you a password reset link.</h3>
            <form method="POST">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control input-sm" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="container text-center p-2">
                    <h5>Or</h5>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control input-sm" id="floatingStaffID" placeholder="Staff ID">
                    <label for="StaffID">Staff ID</label>
                </div>

            <button class="form-control btn btn-sm btn-info" type="">Send password reset email</button>
            </form>
            <a href="stafflogin.php"><button class="btn btn-dark" style="width:180px;">Back to login page</button></a>
        </div>
    </div>
</body>
</html>