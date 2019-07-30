<!DOCTYPE html>
<html>
<head>
  <title>thu_cls</title>
  <style type="text/css">
    h3{
      text-align: center;
      font-family:"Lucida Sans Unicode";
    }
    form{
      font-family:verdana; 
    }
    table, th, td {
    border: 1px solid black;
}
   .button {
position: absolute;
top:6px;
    right: 15px;
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}  
</style>
</head>
<body>
  <?php
session_start();
if ($_SESSION['firstname']==null)
exit();
else{
$duty=$_SESSION['datee'];
 $connect=mysqli_connect("localhost","root","","schedule") or die("nope");
      $sqll=mysqli_query($connect,"SELECT * FROM cseath where date = '$duty' ");
         $re= mysqli_num_rows ( $sqll );
    if ($re>0) {
       
           while ($row=mysqli_fetch_assoc($sqll)) {
      $dboopjl=$row['oopjl'];
      $dbco=$row['co'];
      
       $dbflat=$row['flat'];
    }
	}
	else{
		echo "No entry found .";
	    exit();
	}
  }
  ?>
 
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
    <h3>WELCOME,CSE-A</h3>
    <strong>DATE:<?php echo date("Y-m-d") . "<br>";?></strong>
    <strong>TIME:<?php 
    date_default_timezone_set('Asia/Kolkata');
    echo date("h:i:sa") . "<br>";?></strong>
<a href="logout.php" class="button">Logout</a>
    <table>
  <tr>
   
    <th>OOPJL</th>
    
    <th>CO</th>
    <th>FLAT</th>
  </tr>
  
    
   <div style="overflow: auto;"> 
<td> <?php echo "$dboopjl" ;?> <rows="5" cols="40" ></td>
    <td> <?php echo "$dbco" ;?> <rows="5" cols="40" ></td>
   
    <td> <?php echo "$dbflat" ;?> <rows="5" cols="40" ></td>
</div>
  
  
</table>
  

  
  </form>
</body>
</html>