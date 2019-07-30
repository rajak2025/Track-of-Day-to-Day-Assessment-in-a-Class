<!DOCTYPE html>
<html>
<head>
  <title>fri_cls</title>
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
      $sqll=mysqli_query($connect,"SELECT * FROM csef where date = '$duty' ");
         $re= mysqli_num_rows ( $sqll );
    if ($re>0) {
       
           while ($row=mysqli_fetch_assoc($sqll)) {
      $dbosl=$row['osl'];
      $dbgs=$row['gs'];
      
       $dbflatt=$row['flatt'];
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
   
    <th>OOPJ</th>
    <th>GS</th>
    <th>FLAT</th>
  </tr>
  
    
   <div style="overflow: auto;"> 
<td> <?php echo "$dbosl" ;?> <rows="5" cols="40" id="OOPJbox" class="cot"></td>
  
    <td> <?php echo "$dbgs" ;?> <rows="5" cols="40" id="OOPJbox" class="os"></td>
    <td> <?php echo "$dbflatt" ;?> <rows="5" cols="40" id="OOPJbox" class="flat"></td>
</div>
  
  
</table>
  

  
  </form>
</body>
</html>