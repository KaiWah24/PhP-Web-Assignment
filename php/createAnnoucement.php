<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create announcement</title>
    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
    <link href="sidenav.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="shareFont.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8e353a5380.js" crossorigin="anonymous"></script>
    <link href="createAnnoucement.css" rel="stylesheet">
     <?php
     include 'header.php';
     include 'helper.php';
     
     if ($_SERVER['REQUEST_METHOD']== 'POST'){ 
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $name = $_POST['admin_name'];

        $q = "INSERT INTO `annoucement`(`title`, `content`, `date`, `admin_id`) VALUES (?,?,?,?)";
        $stmt = $dbc->prepare($q);
        $stmt->bind_param('ssss', $title,$content,$date,$name);
        $stmt->execute();
    }

    if (isset($_POST['submit'])){
    echo "<div class='successful' style='width:70%; margin-top:45px; background-color:rgb(0,0,0);'><h5>Create successfully!</h5>";
    echo "<a href='annoucement.php'><button class='btn btn-secondary' style='color: #66fcf1;'>Back to annoucement</button></a></div>";
    }

?>
    </head>
<body>       
        <div class="wrapper">
        <form action="createAnnoucement.php" method="POST">

        <h3>Create announcement</h3>
        <hr>
            <div class="container form-group col-7">
            <label for="title">Title of the announcement:</label>
            <input type="text"  required name="title" class="form-control" placeholder="Title" class="form-control">
            </div>
            <div class="container form-group col-7">
            <label for="title">Content:</label>
            <textarea class="form-control"rows="4" cols="100" name="content" required></textarea>
            </div>
            <div class="container form-group col-7">
            <label for>Date: </label>
            <input type="date" class="form-control" id="date" min="<?php echo date("Y-m-d");?>" required  name="date" required>
            </div>
            <div class="container form-group col-7">
            <label for>By whom: </label>
            <input type="text" class="form-control" name="admin_name" required>
            <input type='submit' name='submit' class="btn btn-secondary" style="color: #66fcf1; margin-top: 25px;" value="Create">
            </div>
        </div>
    </form>
</div>


</body>
</html>
