<!DOCTYPE html>
<html>
<head>
  <title>date page</title>
  <style type="text/css">
    h3{
     
      text-align: center;
      font-family:"Lucida Sans Unicode";
    }
    form{
      font-family:verdana; 
    }
    .error{
color: red;
text-align: center;
}
input#submit {
      display:block;
      position: absolute;
  background-color: #4CAF50; /* Green */
    color: white;
}
.button {
background-color: #4CAF50;
color:white;
}
body { 
    background-color:#FEF9E7;
    background-image:url(" ../new/logo.PNG");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: 50% 70%; 
}
 
   
button:hover {
background-color: #4CAF50; /* Green */
color: white;
}
<?php
session_start();
$dateee="";
$dateeeErr="";

if($_SESSION['firstname']==null)
	exit();


if ($_SERVER["REQUEST_METHOD"] == "POST"){
	#check whether,$session variables is set or not
	$dateee=strip_tags($_POST['dateee']);
	if (empty($_POST['dateee'])) 
    $dateeeErr = "Date is required     ";
   else {
    $dateee = test_input($_POST['dateee']);
       if(!preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $dateee)){
               $dateeeErr = "Invalid Date Format     ";
      
}else{
     $_SESSION['datee']=$dateee;
     $timestamp = strtotime($dateee);
      $dayz = date('l', $timestamp);
        if($_SESSION['grad']=="btech" &&$_SESSION['course']="cse"&&$_SESSION['sec']="a"){
           $connect=mysqli_connect("localhost","root","","schedule") or die("coudn't connect");
		   
          if($dayz=="Monday")
          header("Location: ../new/togo.php"); 
          elseif($dayz=="Tuesday")
          header("Location: ../new/togo1.php"); 
          elseif($dayz=="Wednesday")
          header("Location: ../new/togo2.php");
          elseif($dayz=="Thursday")
          header("Location: ../new/togo3.php");  
          elseif($dayz=="Friday")
          header("Location: ../new/togo4.php");
          elseif($dayz=="Saturday")
          header("Location: ../new/togo5.php");  
          else
         $dateeeErr="No Class";
}
}	
	}
   }  

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
  </style>
</head>
<body>
 

  <form method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  <h3>WELCOME,<?php 
echo  ucfirst($_SESSION['firstname']). " " . ucfirst($_SESSION['lastname']);?></h3>
    <strong>DATE:<?php echo date("Y-m-d") . "<br>";?></strong>
    <strong>TIME:<?php 
    date_default_timezone_set('Asia/Kolkata');
    echo date("h:i:sa") . "<br>";?>
	</strong>
    <div class=datee>
       <h3>
	   To know what was taught,enter the required date in YYYY-MM-DD format:<br>
	   <span class="error">
	   <input type="text" placeholder="YYYY-MM-DD" name="dateee" value=<?php echo $dateee; ?> >*
	    <button type="submit">Submit</button><br><?php echo $dateeeErr;?></span>


		
		</div>
	   </h3> 
  </form>
</body>
</html>