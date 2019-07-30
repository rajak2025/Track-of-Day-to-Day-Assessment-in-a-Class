<html>
<head>
<style type="text/css">
body{
background-color:#665544;
background:url(" ../new/st.JPG")  no-repeat center center fixed;
 -webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
}
.error{
color: red;
}
h1{
text-shadow: 2px 2px 5px red;
color:#212F3D;
text-align:center ;
font-size:48px;
}
marquee{
background-color:#F1948A;
color:#A93226;
line-height:6px;
font-size:12px;
}

form{
color:#F0F3F4;
font-size:19px;
margin:auto;
box-sizing:border-box;
font-family:"Lucida Sans Unicode";
padding:0px 30px 240px 210px;
}
.button {
background-color: #4CAF50;
color:white;
}
.container{
background:url(" ../new/us.JPG")  no-repeat center center fixed;
 -webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
height:20%;
width:20%;
right:5%;
left:5%;
padding:0px 70px 450px 30px;
border: 3px solid #E74C3C;
margin: 80px 690px ;
box-shadow: 10px 10px #F5B7B1;
}

button:hover {
  background-color: #3e8e41;
   
    
}
button{
padding:4px 4px;
cursor: pointer;
display:block;
color: #fff;
position:relative;
width:80px;
 background-color: #4CAF50;
}
button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

input{
width:100%;
}
<?php

$uidErr = $pwdErr = $acodeErr = "";
$uid = $pwd = $acode = "";
if (isset($_POST['button1'])) {
  # code...
$uid=strip_tags($_POST['uid']);
$pwd=strip_tags($_POST['pwd']);
if (empty($_POST["uid"])) 
    $uidErr = " UserName is required";
   else 
    $uid = test_input($_POST["uid"]);
if (empty($_POST["pwd"])) 
    $pwdErr = " Password is required";
   else 
    $pwd = test_input($_POST["pwd"]);  
    if($uidErr==""&&$pwdErr==""){
	
    $connect=mysqli_connect("localhost","root","","loginsystem") or die("coudn't connect");
    $qu=mysqli_query($connect, "SELECT userid,pwd from signup where userid='$uid'");
    $re= mysqli_num_rows ( $qu );
    if ($re>0) {
      # code...
                $cpwd=md5($pwd);
	  
                while($row=mysqli_fetch_assoc($qu)){
                     $dbusername=$row['userid'];
                     $dbpassword=$row['pwd'];
}

	   if($dbusername==$uid && $dbpassword==$cpwd)

	      header("Location: ../new/j.html");
         
else
	$pwdErr= "Incorrect pwd";
    }
else
$uidErr="User doesn't exist";
   }
}
else
{
if(isset($_POST['button2'])){
if (empty($_POST["acode"])) 
    $acodeErr = " Access code is required";
   else {
    $acode = test_input($_POST["acode"]);
    if($acode=="griet"){
header("Location: ../new/heyaaa.php");
}
else
$acodeErr="Invalid code";
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
<h1>WELCOME</h1>
<marquee direction="left"><h2>The college stays closed on 01-01-2018 on the occasion of new year eve.GR15 2017-18 II B.Tech I Sem REGULAR Results (Last date for RC/RV is 30-12-2017).GR15 2017-18 III B.Tech I Sem REGULAR Results (Last date for RC/RV is 29-12-2017).GR14 2017-18 IV B.Tech I Sem REGULAR Results (Last date for RC/RV is 29-12-2017)</h2></marquee>
<form  method="POST">
<div class=container>
<h2>
LOG IN
</h2>
<div>
Username:<span class="error">* <input type="text" placeholder="Enter Username" name="uid" value="<?php echo $uid;?>">
<br><?php echo $uidErr;?></span>
</div>
<div>
Password:<span class="error">*<input type="password" placeholder="Enter Password" name="pwd" >
<br> <?php echo $pwdErr;?></span>
</div>
<button type="submit"    name ="button1" >Login</button><br>
<h3>New user?To sign up ,enter the access code!</h3>
Access Code:<span class="error">*<input type="password" placeholder="Enter Access Code" name="acode" >
<br> <?php echo $acodeErr;?></span>

<button type="submit"   name ="button2" >Submit</button><br>
</div>
</form>
</body >
</html>