<?php
session_start();
if(isset($_SESSION['login_user'])){
?>
<!DOCTYPE html>
<html>
    <head>
	<title>Welcome to Bill payment</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $("p").hide();
    });
    $("#show").click(function(){
        $("p").show();
    });
});

</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("div.desc").hide();
    $("input[name$='cars']").click(function() {
        var test = $(this).val();
        $("div.desc").hide();
        $("#" + test).show();
    });
});
</script>
        <?php
include 'connection.php';

$name=$_POST["name"];
$choice=$_POST['choice'];
$quant=$_POST['quantity'];
$price=$_POST['price'];



 $sql ="select name,price from menu  where R_name='$name'";
 $result= $conn->query($sql);
 $count=0;
  while( $row = $result->fetch_assoc() ){   
  $name_price[]=$row;
  $count++;
  }
$arrlength = count($choice);
//print_r($quant);
$quantity;
$totalPrice=0;
$totalItem=0;
$j=0;
   for($i = 0;$i<$count;$i++){
   if($quant[$i]!=""){
   $quantity[$j]=$quant[$i];
   $j++;
   }
   }
   ?>
		<style>
                             
   .button{
    background-color: maroon;
    border: none;
    color: white;
    padding: 15px 30px;
    text-align: center;
    text-decoration:white;
    display: inline-block;
    font-size: 20px;
    margin:10px auto;
    float:left;
   
   }
   
    .betton{
    background-color: wheat;
    border: none;
    color:black;
    padding: 1px 1px;
    text-align: center;
    text-decoration:black;
    display: inline-block;
    font-size: 20px;
    margin:5px auto;
    float:left;
   }
    

   body {
    background-image: url("paper.jpg");  
}
h1 {
          color: darkred;
         }
              body {
          color:black;
         }

div {
    border: 1px solid white;
    margin-top: 0px;
    margin-bottom: 100px;
    margin-right: 0px;
    margin-left: 0px;
    background-color:greenyellow;
   
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
}

td, th {
    border: 1px darkred;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: darkred;
}
</style>
	</head>
	<body>
            <h1>TOTAL BILL</h1>
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
        
            
       
		<table>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
			<?php 
			
			foreach ( $name_price as $var ) { 
			
			for($i=0;$i<$arrlength;$i++){
			if($var["name"]==$choice[$i]){
			$totalPrice=$totalPrice+ intval($var["price"])*intval($quantity[$i]);
			$totalItem=$totalItem+intval($quantity[$i]);
                         
      
			?>
			<tr>
           <td><?php echo $var["name"] ; ?></td>
		   <td><?php echo $var["price"]; ?></td>
		   <td><?php echo $quantity[$i]; ?></td>
		   </tr>
		   <?php }
		   }
		   }
                                      
            $conn=new mysqli("localhost","root","","onlinefood");   
            
            $sql2 ="select * from customer where name ='".$_SESSION['login_user']."'";
            $result1=$conn->query($sql2);
            $row = mysqli_fetch_array($result1);
            $id = $row['id']; 
            $username = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
                   
            if(isset($_POST['order'])){
            $sql="INSERT INTO bill(user_id,total_price,total_quantity) VALUES('$id','$totalPrice',' $totalItem')";
            $query=$conn->query($sql);
            }
		  ?>
		  <tr>
		  <td>Total</td>
		  <td><?php echo "RS".$totalPrice ;?></td>
		  <td><?php echo $totalItem." item";?></td>
		  </tr>
         </table>
		 <form  method ="POST">
		            <table>
                <td></td>
                    <div id="myRadioGroup" style="background-image: url(paper.jpg); height: 400px; width: 700px; border: 1px solid black;">

                           Cash On Delivery<input type="radio" name="cars"  value="cod"  />

                           Online Payment<input type="radio" name="cars" value="online" />

                       <div id="cod" class="desc" style="background-image: url(paper.jpg); height: 300px; width: 500px;">
                        <form name="myForm" action="contact.php"
                       onsubmit="return validateForm()" method="post">
                           First name:<br>
                           <input type="text" name="firstname">
                           <br>
                           Last name:<br>
                          <input type="text" name="lastname"><br>
                           Mobile number:<br>
                           <input type="text" name="firstname">
                           <br>
                           Address:<br>
                          <input type="text" name="lastname"><br>
                           <a href="http://localhost/Onlinefood/Welcome/contact.php" class="button">Submit</a>

                        </div>
                        <form method="post" action="vishal.php">
                         <div id="online" class="desc" style="background-image: url(paper.jpg); height: 300px; width: 500px;">
                             <label class="control-label col-sm-4" for="text">Card Number:</label></br>
                             <input type="text" name="c_no" class="textInput" id="c_no"></br>
                             <label class="control-label col-sm-4" for="text">CVV:</label></br>
                             <input type="password" name="cvv" class="textInput"></br>
                             <label class="control-label col-sm-4" for="text">Pin:</label></br>
                             <input type="password" name="pin" class="textInput"></br>
                             <input type="submit" class="button" id="pin"></button>
                          </form>
                         </div>
                    </div>
                    
                </tr>
            
            </table>
		 </form>
     

    
        </body>
</html>
<?php
//$update= "INSERT INTO bill(username,email,password) VALUES('$username','$email','$password')";
//$conn->query($update);
}
else{
header ("Location: ../register/index.php");
}
?>