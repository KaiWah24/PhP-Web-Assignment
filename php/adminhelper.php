<?php
include 'connection.php';
session_start();
if (isset($_SESSION['username'])){
    $admin_id= ($_SESSION['username']); 
} else{
    header("Location: login.php");
}

function getGameList(){
                                    
return ["G1"=>"Valorant",
        "G2" => "PUBG",
        "G3" => "CS:GO",
        "G4" => "Mobile Legends",
        "G5" => "League of Legends"
        ];
}

function getVenueList(){
                                    
return ["V1"=>"CyberSport Arena",
        "V2" => "Jinyun Culture Stadium",
        "V3" => "Mariynskiy Park",
        "V4" => "Spodek Arena",
        "V5" => "Axiata Arena"
        ];
}

function getGender(){
                                    
return ["M"=>"MALE",
        "F" => "FEMALE",
        ];
}
?>


