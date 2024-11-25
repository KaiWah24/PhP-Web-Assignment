<html>
    <head>
    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
    <link href="indexstaff.css" rel="stylesheet">
    <link href="sidenav.css" rel="stylesheet">
    <link href="shareFont.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="indexstaff.js"></script>
    <script src="https://kit.fontawesome.com/8e353a5380.js" crossorigin="anonymous"></script>
    <?php
    include 'helper.php';
    include 'background.css';
    $q = "SELECT * FROM annoucement";
    $run = mysqli_query($dbc,$q);
    $count = mysqli_num_rows($run);
   
    if(isset($_GET['delete'])){
       $del = $_GET['delete'];
       $deletion = "DELETE FROM annoucement WHERE title = ?";
       $stmt = $dbc->prepare($deletion);
       $stmt ->bind_param('s',$del);
       $stmt ->execute();             
    }
?>
    <style>
        .add{
            background-color:#45A29E;
            padding: 5px;
            border-radius: .25rem;
            color:black;
        }
        .add:hover{
            color:#c5c6c7;
        }
        body{
                background-image:url(backg.jpg);
        }
    </style>
    
    <script>
        function displayNone(){
           var element =  document.getElementsByClassName("theader");
           for (var i = 0; i < element.length;i+=1){
               element[i].style.display = "none";
           }
        }
    </script>
    </head>
    <body>
<?php
include 'sidenav.php';
?>
    <div class="container margin-left wrapper">
        <div class='heading d-flex justify-content-between' style='padding-top:10px'>
        <h5>Currently online announcement<h5>
       <p><a href="createannoucement.php" class='add'>  
       <i class="fa-solid fa-circle-plus" class='add'></i></a></p>
       </div>
        <hr>
        <table id="myTable" class="table table-striped table-hover table-responsive table-bordered">
            <thead>
            <tr class="header">
            <th style="width: 45%; background-color:#45A29E;" class="theader">Title</th>
            <th style="width: 25%; background-color:#45A29E;"class="theader">Date</th>
            <th style="width: 10%; background-color:#45A29E;"class="theader">Admin_Name</th>
            <th colspan='2' style="width: 5%;background-color:#45A29E;"class="theader">Action</th>
            </tr>
            </thead>
             <tbody>
                <?php
                if ($count <= 0) {
                    echo '<h5>No records are available..</h5>';
                    echo '<script>displayNone();</script>';
                } 
                else{
                    while ($row = mysqli_fetch_array($run)){
                        echo '<tr>';
                        echo '<td>'.$row["title"].'</td>';
                        echo '<td>'.$row["date"].'</td>';
                        echo '<td>'.$row["admin_id"].'</td>';
                        echo '<td><a href=deleteAnnouncement.php?delete='. urlencode($row["title"]).'><button class="btn btn-danger btn-sm" onclick="">Delete</button></a></td>';
                        echo '</tr>';       
                    }
                    echo '<caption style="color:whitesmoke;">'.$count.' Result(s) displayed</caption>';
                }
                ?>
                </tbody>
            </table>
        </div>
    
    </body>
</html>
