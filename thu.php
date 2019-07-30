<!DOCTYPE html>
<html>
<head>
  <title>cr filling forms</title>
  <style type="text/css">
    h3{
      text-align: center;
      font-family:"Lucida Sans Unicode";
    }
.button {
position: absolute;
top:65px;
    right: 15px;
    background-color: red;
    border: none;
    color: white;
    padding: 9px 28px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
} 
    form{
      font-family:verdana; 
    }
    table, th, td {
    border: 1px solid black;
}
    #OOPJbox{
     
     width:440px;
     height:450px; 
     
    
     font-size:18px;
     
    
    }
    #flatbox{
     width:260px;
     height:450px; 
     
     
     font-size:18px;
    
     
    }
    #cotbox{
     width:260px;
     height:450px; 
     
     font-size:18px;
     
     
    }
    #osbox{
     width:260px;
     height:450px; 
     
     
     
     font-size:18px;
     
     
    }
    .error{
  color: red;
}

    input#submit {
      display:block;
      
position:relative;
   
    top: 1px;
    left: 1040px;
    right: 1px;
    padding:10px 16px;
  background-color: #4CAF50; /* Green */
    color: white;
cursor: pointer;
    
}
  </style>
</head>
<body>
  <?php
  session_start();
  $oopjlErr = $coErr = $flatErr = "";
  $oopjl = $co  = $flat =  $info = "";
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
#session is set...
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date= date("Y-m-d");
 if (empty($_POST["oopjl"])) {
    $oopjlErr = " Mandatory field";
  } else {
    $oopjl = processText($_POST["oopjl"]);
    }
    if (empty($_POST["co"])) {
    $coErr = " Mandatory field";
  } else {
    $co = processText($_POST["co"]);
    }
    
    if (empty($_POST["flat"])) {
    $flatErr = " Mandatory field";
  } else {
    $flat = processText($_POST["flat"]);
    }
    if ($oopjlErr==""&&$coErr==""&&$flatErr=="") {
      # code...
           //connecting to the database
      $connect=mysqli_connect("localhost","root","","schedule") or die("nope");
      $sqll=mysqli_query($connect,"INSERT into cseath(oopjl,co,flat,date) values('$oopjl','$co','$flat','$date')");
         
          echo "submitted!";
}
    }
  }
else
header("Location: ../new/logout.php");
  function processText($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  ?>
  <form method="POST" >
    <h3>Please fill the following information!<div class="error"><?php echo $info;?></div> </h3>
 <input type="submit"  value ="submit"  name ="submit" id="submit"><br>
<a href="logout.php" class="button">Logout</a>
    <table>
      <tr>
        <th>8:00-8:50||8:50-9:40||9:40-10:30||10:30-11:00</th>
        
        <th>11:00-11:30</th>
        <th>11:30-12:00||12:30-1:10</th>
        <th>|1:10-2:00</th>
        
      </tr>
  <tr>
    <th rows="4" >OOPJL<span class="error">* <br><?php echo $oopjlErr;?></span></th>
    
     <th>Break</th>
     <th>FLAT<span class="error">* <br><?php echo $flatErr;?></span></th>
     <th>CO<span class="error">* <br><?php echo $coErr;?></span></th>
  </tr>
  <tr>
    <td><textarea  name="oopjl" placeholder="Enter what was taught in oopj lab" rows="5" cols="40" id="OOPJbox"></textarea></td>
     <td rowspan="6"align="center"><strong>L<BR>U<BR>N<BR>C<BR>H<BR></strong></td>
    <td><textarea  name="flat" placeholder="Enter what was taught in FLAT class" rows="5" cols="40" id="cotbox"></textarea></td>
    
    
    
    <td><textarea name="co" placeholder="Enter what was taught in co class" rows="5" cols="40" id="flatbox"></textarea></td>
   

  </tr>
  
</table>
  

  
  </form>
</body>
</html>