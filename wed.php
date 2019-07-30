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
     width:260px;
     height:450px; 
     
     background:white;
     padding:10px;
     font-size:18px;
     
     color:#1B2631; 
    }
    #flatbox{
     width:260px;
     height:450px; 
     
     background:white;
     padding:10px;
     font-size:18px;
    
     color:#1B2631; 
    }
    #cotbox{
     width:260px;
     height:450px; 
     
     background:white;
     padding:10px;
     font-size:18px;
     
     color:#1B2631; 
    }
    #osbox{
     width:260px;
     height:450px; 
     
     
     padding:10px;
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
  $oopjErr = $coErr = $osErr = $mefaErr = "";
  $oopj = $co = $os = $mefa =  $info = "";
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1){
#session is set...
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date= date("Y-m-d");
 if (empty($_POST["oopj"])) {
    $oopjErr = " Mandatory field";
  } else {
    $oopj = processText($_POST["oopj"]);
    }
    if (empty($_POST["co"])) {
    $coErr = " Mandatory field";
  } else {
    $co = processText($_POST["co"]);
    }
    if (empty($_POST["os"])) {
    $osErr = " Mandatory field";
  } else {
    $os = processText($_POST["os"]);
    }
    if (empty($_POST["mefa"])) {
    $mefaErr = " Mandatory field";
  } else {
    $mefa = processText($_POST["mefa"]);
    }
    if ($oopjErr==""&&$coErr==""&&$osErr==""&&$mefaErr=="") {
      # code...
           //connecting to the database
      $connect=mysqli_connect("localhost","root","","schedule") or die("nope");
      $sqll=mysqli_query($connect,"insert into cseaw(oopj,co,os,mefa,date) values('$oopj','$co','$os','$mefa','$date')");
         
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
        <th>8:00-8:50</th>
        <th>8:50-9:40||9:40-10:30</th>
        <th>10:30-11:00</th>
        <th>11:00-11:45||11:45-12:30</th>
        <th>12:30-1:15||1:15-2:00</th>
        
      </tr>
  <tr>
    <th>OOPJ<span class="error">* <br><?php echo $oopjErr;?></span></th>
    <th>CO<span class="error">* <br><?php echo $coErr;?></span></th>
     <th>Break</th>
     <th>OS<span class="error">* <br><?php echo $osErr;?></span></th>
     <th>MEFA<span class="error">* <br><?php echo $mefaErr;?></span></th>
  </tr>
  <tr>
    <td><textarea  name="oopj" placeholder="Enter what was taught in oopj class" rows="5" cols="40" id="OOPJbox"></textarea></td>
    
    <td><textarea  name="co" placeholder="Enter what was taught in CO class" rows="5" cols="40" id="cotbox"></textarea></td>
     <td rowspan="6"align="center"><strong>L<BR>U<BR>N<BR>C<BR>H<BR></strong></td>
    <td><textarea  name="os" placeholder="Enter what was taught in os class" rows="5" cols="40" id="osbox"></textarea></td>
    
    <td><textarea name="mefa" placeholder="Enter what was taught in mefa class" rows="5" cols="40" id="flatbox"></textarea></td>
   

  </tr>
  
</table>
   

  
  </form>
</body>
</html>