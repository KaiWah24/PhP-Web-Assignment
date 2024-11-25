<html>
    <head>
    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
    <link href="indexstaff.css" rel="stylesheet">
    <link href="sidenav.css" rel="stylesheet">
    <link href="shareFont.css" rel="stylesheet">
    <link href="createAnnoucement.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="indexstaff.js"></script>
    <script src="https://kit.fontawesome.com/8e353a5380.js" crossorigin="anonymous"></script>
    <?php
    include 'header.php';
    include 'helper.php';

    $id = $_GET['delete'];
    
    $q = "SELECT * FROM ANNOUCEMENT WHERE title = ?";    
    $stmt = $dbc->prepare($q);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
?>
    <style>
        .form-control{
            width:35%;
        }
        
        form,input,label{
            padding:5px;
        }
        
    </style>
    </head>
    <body>
        <div class="container" style="padding:5px;">
            <form action='deleted.php' method='POST'>
            <h5 style="text-align:center"> Are you sure to delete this annoucement? </h5>
            <hr>
            <table id="myTable" class="table table-striped table-hover table-responsive table-bordered">
                <thead>
                <tr class="header">
                <th style="width: 45%; background-color:#45A29E;">Title</th>
                <th style="width: 25%; background-color:#45A29E;">Date</th>
                <th style="width: 10%; background-color:#45A29E;">Admin_Name</th>
                 </tr>
                </thead>
                 <tbody>
                    <?php   
                    echo '<tr>';
                    echo '<td>'.$row["title"].'</td>';
                    echo "<input type=hidden name='$id' value='$id'>";
                    echo '<td>'.$row["date"].'</td>';
                    echo '<td>'.$row["admin_id"].'</td>';
                    echo '</tr>';       
                    ?>
                </tbody>
            </table>
 
            </form>
        </div>
            <?php
    echo "<div class='container d-flex justify-content-start'>"; 
    echo "<a href='deleted.php?delete=".urlencode($id)."'><button class='btn btn-secondary' style='color: #66fcf1;margin-bottom:10px;'>Confirm</button></a>";
    echo "<a href='annoucement.php'><button class='btn btn-secondary' style='color: #66fcf1; margin-bottom: 10px; margin-left:10px;'>Cancel</button></a>";
    echo "</div>";
    ?>
        <hr>
    </body>
</html>
