<!DOCTYPE html>
<html>
<head>
  <title>cr filling forms</title>
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
    #OOPJbox{
     
     width:440px;
     height:450px; 
     
    
     font-size:18px;
     
    
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
  $adblErr = $mefaErr = $flatErr = "";
  $adbl = $mefa  = $flat =  $info = "";
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
#session is set...
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date= date("Y-m-d");
 if (empty($_POST["adbl"])) {
    $adblErr = " Mandatory field";
  } else {
    $adbl = processText($_POST["adbl"]);
    }
    if (empty($_POST["mefa"])) {
    $mefaErr = " Mandatory field";
  } else {
    $mefa = processText($_POST["mefa"]);
    }
    
    if (empty($_POST["flat"])) {
    $flatErr = " Mandatory field";
  } else {
    $flat = processText($_POST["flat"]);
    }
    if ($adblErr==""&&$mefaErr==""&&$flatErr=="") {
      # code...
           //connecting to the database
      $connect=mysqli_connect("localhost","root","","schedule") or die("nope");
      $sqll=mysqli_query($connect,"insert into cseas(adbl,mefa,flat,date) values('$adbl','$mefa','$flat','$date')");
         
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
    <th rows="4" >ADBL<span class="error">* <br><?php echo $adblErr;?></span></th>
    
     <th>Break</th>
     <th>MEFA<span class="error">* <br><?php echo $mefaErr;?></span></th>
     <th>FLAT<span class="error">* <br><?php echo $flatErr;?></span></th>
  </tr>
  <tr>
    <td><textarea  name="adbl" placeholder="Enter what was taught in adb lab" rows="5" cols="40" id="OOPJbox"></textarea></td>
     <td rowspan="6"align="center"><strong>L<BR>U<BR>N<BR>C<BR>H<BR></strong></td>
    <td><textarea  name="mefa" placeholder="Enter what was taught in mefa class" rows="5" cols="40" id="cotbox"></textarea></td>
    
    
    
    <td><textarea name="flat" placeholder="Enter what was taught in flat class" rows="5" cols="40" id="flatbox"></textarea></td>
   

  </tr>
  
</table>
  

  
  </form>
</body>
</html>