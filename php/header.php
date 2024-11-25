<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet">
    <link href="sidenav.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8e353a5380.js" crossorigin="anonymous"></script>
    <title><?= $title ?></title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Prompt&display=swap%27');

    body,html{
    font-family: 'Prompt', sans-serif !important;
    background-color: #1f2833;
    background-image:url(backg.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    }
    
    caption{
        color:whitesmoke !important;
    }
    
    ::-webkit-calendar-picker-indicator {
    filter: invert(1);
    }

</style>
      <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                } else {
                tr[i].style.display = "none";
                }
            }       
            }
        }
        </script>
<body>

<?php include'sidenav.php'?>
</div>
