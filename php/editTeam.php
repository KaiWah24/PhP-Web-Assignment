<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Event</title>
        <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
        <link href="/css/sidenav.css" rel="stylesheet">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <link href="/css/teamInfo.css" rel="stylesheet">
        <link href="/css/shareFont.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/8e353a5380.js" crossorigin="anonymous"></script>
        <script src="/js/teamInfo.js"></script>
        
        <?php 
            include 'connection.php';
            
            $q = "SELECT booking_id AS id, event_name AS eName, booking_date AS bDate, "
            . "team_name AS tName, registration_fee AS regFee FROM booking";
            
            $run = mysqli_query($dbc,$q);
            
            $count = mysqli_num_rows($run);
             
            //Booking _ id = 'id'
            // Event_name = 'eName'
            // Booking_date = 'bDate'
            // team_name = tName
            // registration_fee = 'regFee'  
            
       

        ?>
    </head>
<body>
    <div class="sidenav container-fluid">
        <a href="/html/indexstaff.html" id="logo"><img src='/image/1.png' class='img-fluid rounded-pill' id='brand' alt="brand logo"></a>
        <h5>KW Esports Gaming Society</h5>
        <hr>
        <a href="/html/indexstaff.html"> <i class="fa-solid fa-house"></i> Home</a> 
        <a href="/html/booking.html"><i class="fa-solid fa-book-open"></i> Bookings</a>
        <a href="/html/event.html"><i class="fa-solid fa-calendar"></i> Events</a>
        <a href="/html/profileDetails.html"><i class="fa-solid fa-user"></i> Profile</a>
        <a href="/html/indexstaff.html"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
    </div>

    <div class="container margin-left wrapper" style="background-image: url('/image/caro_background.jpg'); opacity:0.98;">
        <h3 id="top" style="color:whitesmoke; display:inline-block"><?php
        
        ?></h3>
        <div class="container">
            <div class="accordion container" style="width:80%;" id="accordionExample">
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Team #1
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <th style="width:5%">No.</th>
                                <th>IGN</th>
                                <th>Name</th>
                                <th>Join Date</th>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($run)){
                                    echo '<tr>';
                                    echo '<td>'.$row["id"].'</td>';
                                    echo '<td>'.$row["eName"].'</td>';
                                    echo '<td>'.$row["bDate"].'</td>';
                                    echo '<td>'.$row["tName"].'</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <button class="btn btn-primary" id="teamOne" onclick=toShowBlock()>Edit info</button>
                        <button class="btn btn-danger" onclick="alert()">Delete</button>
                    </div>
                </div>
                </div>

                <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Team #2
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <th style="width:5%">No.</th>
                                <th>IGN</th>
                                <th>Name</th>
                                <th>Join Date</th>
                            </thead>
                            <tbody>
                                <tr class="bg-black">
                                    <td>1.</td>
                                    <td>ShahZaM</td>
                                    <td>Shahzeb Khan</td>
                                    <td>23-Jun-2022</td>
                                </tr>

                                <tr class="">
                                    <td>2.</td>
                                    <td>Dapr</td>
                                    <td>Michael Gulino</td>
                                    <td>23-Jun-2022</td>
                                </tr>

                                <tr>
                                    <td>3.</td>
                                    <td>Tenz</td>
                                    <td>Tyson Ngo</td>
                                    <td>23-Jun-2022</td>
                                </tr>

                                <tr>
                                    <td>4.</td>
                                    <td>Zellsis</td>
                                    <td>Jordan Montemurro</td>
                                    <td>23-Jun-2022</td>
                                </tr>

                                <tr>
                                    <td>5.</td>
                                    <td>Shroud</td>
                                    <td>Mike</td>
                                    <td>23-Jun-2022</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary" id="teamTwo" onclick=toShowBlock()>Edit info</button>
                        <button class="btn btn-danger" onclick="alert()">Delete</button>
                    </div>
                </div>
                </div>



                <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Team #3
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <th style="width:5%">No.</th>
                                <th>IGN</th>
                                <th>Name</th>
                                <th>Join Date</th>
                            </thead>
                            <tbody>
                                <tr class="bg-black">
                                    <td>1.</td>
                                    <td>ShahZaM</td>
                                    <td>Shahzeb Khan</td>
                                    <td>23-Jun-2022</td>
                                </tr>

                                <tr class="">
                                    <td>2.</td>
                                    <td>Dapr</td>
                                    <td>Michael Gulino</td>
                                    <td>23-Jun-2022</td>
                                </tr>

                                <tr>
                                    <td>3.</td>
                                    <td>Tenz</td>
                                    <td>Tyson Ngo</td>
                                    <td>23-Jun-2022</td>
                                </tr>

                                <tr>
                                    <td>4.</td>
                                    <td>Zellsis</td>
                                    <td>Jordan Montemurro</td>
                                    <td>23-Jun-2022</td>
                                </tr>

                                <tr>
                                    <td>5.</td>
                                    <td>Shroud</td>
                                    <td>Mike</td>
                                    <td>23-Jun-2022</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary" id="teamThree" onclick=toShowBlock()>Edit info</button>
                        <button class="btn btn-danger" onclick="alert()">Delete</button>
                    </div>
                </div>
                </div>

                <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Team #4
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <th style="width:5%">No.</th>
                                <th>IGN</th>
                                <th>Name</th>
                                <th>Join Date</th>
                            </thead>
                            <tbody>
                                <tr class="bg-black">
                                    <td>1.</td>
                                    <td>ShahZaM</td>
                                    <td>Shahzeb Khan</td>
                                    <td>23-Jun-2022</td>
                                </tr>

                                <tr class="">
                                    <td>2.</td>
                                    <td>Dapr</td>
                                    <td>Michael Gulino</td>
                                    <td>23-Jun-2022</td>
                                </tr>

                                <tr>
                                    <td>3.</td>
                                    <td>Tenz</td>
                                    <td>Tyson Ngo</td>
                                    <td>23-Jun-2022</td>
                                </tr>

                                <tr>
                                    <td>4.</td>
                                    <td>Zellsis</td>
                                    <td>Jordan Montemurro</td>
                                    <td>23-Jun-2022</td>
                                </tr>

                                <tr>
                                    <td>5.</td>
                                    <td>Shroud</td>
                                    <td>Mike</td>
                                    <td>23-Jun-2022</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary" id="teamFour" onclick=toShowBlock()>Edit info</button>
                        <button class="btn btn-danger" onclick="alert()">Delete</button>
                    </div>
                </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Team #5
                    </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <th style="width:5%">No.</th>
                                <th>IGN</th>
                                <th>Name</th>
                                <th>Join Date</th>
                            </thead>
                            <tbody>
                                <tr class="bg-black">
                                    <td>1.</td>
                                    <td>ShahZaM</td>
                                    <td>Shahzeb Khan</td>
                                    <td>23-Jun-2022</td>
                                </tr>
    
                                <tr class="">
                                    <td>2.</td>
                                    <td>Dapr</td>
                                    <td>Michael Gulino</td>
                                    <td>23-Jun-2022</td>
                                </tr>
    
                                <tr>
                                    <td>3.</td>
                                    <td>Tenz</td>
                                    <td>Tyson Ngo</td>
                                    <td>23-Jun-2022</td>
                                </tr>
    
                                <tr>
                                    <td>4.</td>
                                    <td>Zellsis</td>
                                    <td>Jordan Montemurro</td>
                                    <td>23-Jun-2022</td>
                                </tr>
    
                                <tr>
                                    <td>5.</td>
                                    <td>Shroud</td>
                                    <td>Mike</td>
                                    <td>23-Jun-2022</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary" id="teamFive" onclick=toShowBlock()>Edit info</button>
                        <button class="btn btn-danger" onclick="confirm('Are you sure to delete this player?')">Delete</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container editInfo margin-left" id="display" style="clear:both; display:none;">
            <h3>Team 5 edit player</h3><button onclick="closingBlock()" style="float:right;">Close</button>
            <form style="padding:5px; width:950px;">
                <div class="form-group">
                    <label for="player#">Player</label>
                    <select class="form-control-sm" id="player#">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="id">IGN: </label>
                    <input type="text" class="form-control form-control-sm" name="id" id="id" required maxlength="15">
                </div>
    
                <div class="form-group">
                    <label for="id">Name: </label>
                    <input type="text" class="form-control form-control-sm" name="id" id="id" required maxlength="30">
                </div>
                
                <div class="documents">
                    <form>
                        <div class="form-group">
                        <label for="documents">Related Documents</label>
                        <input type="file" class="form-control-file" id="documents">
                        </div>
                        <input type="submit">
                    </form>

            </div>
        </div>
    </div>



</body>
</html>