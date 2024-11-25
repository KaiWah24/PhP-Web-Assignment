<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="complete.css">
         <link rel="stylesheet" href="shareFont.css">
         
    </head>
    
    <body>
      <body onload="myFunction()" style="margin:0;">

        <div class="container">
        <div id="loader"></div>
        
        <div style="display:none;" id="myDiv" class="animate-bottom">
          <img src="confirm.png"class="center"alt="confirm"/>
          <div class="confirm">
          <b>Booking Confirmed</b>
          <br><div class="thank">
            <b>Your submission has been confirmed.<br>Thank you for your support and joining.</b>
        <img src="smiling-face.png"width="20px">  
        </div>
        </div>
          <div class="button">
              <a href="homepage.php">Back To Home Page</a></div>
        </div>
      </div>
        

        <script>
        var myVar;
        
        function myFunction() {
          myVar = setTimeout(showPage, 3000);
        }
        
        function showPage() {
          document.getElementById("loader").style.display = "none";
          document.getElementById("myDiv").style.display = "block";
        }
        </script>
    </body>
</html>