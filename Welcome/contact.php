<!DOCTYPE html>
<html lang="en">
<head>
  <title>contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
       body {
    background-image: url("paper.jpg");  
}
  .button{
    background-color: maroon;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration:white;
    display: inline-block;
    font-size: 20px;
    margin:10px auto;
    float:left;
    
   

    }
</style>
<script>
function validateForm() {
    var x = document.forms["myForm"]["name"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>
<body>
    <div class="container">
  <h1>Details</h1>
            <a href="http://localhost/Onlinefood/register/index.php" class="button">HOME</a>
            <a href="http://localhost/Onlinefood/Welcome/index.php" class="button">RESTAURANT</a>
            <a href="http://localhost/Onlinefood/Welcome/index.php" class="button">CONTACT</a>
            <a href="http://localhost/Onlinefood/register/about.php" class="button">ORDER</a>

            <a href="http://localhost/Onlinefood/Welcome/index.php" class="button">ABOUT</a>
            <a href="logout.php" class="button">Logout</a>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
   
   
   
       
       <h1>Thank You For Order</h1>


</body>
</html>
