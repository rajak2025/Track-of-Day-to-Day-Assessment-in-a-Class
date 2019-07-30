<html>
<head>
  <title>form validation with php</title>
  <style>
body{
background:url(" ../yy.JPG")  no-repeat center center fixed;
 -webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
}
form{
color:#1B2631;

font-size:19px;
margin:auto;

box-sizing:border-box;
font-family:"Lucida Sans Unicode";
padding:0px 30px 240px 210px;
 
}
h3{
display:block;
padding:20px 0px 0px 0px;
 color:#34495E;
    text-shadow: 2px 2px 4px #000000;
}

.container{
background:url(" ../yy.PNG")  no-repeat center center fixed;
 -webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
height:20%;
width:20%;
right:5%;
left:5%;
padding:0px 120px 210px 140px;
color:#1B2631;
 margin: 80px 690px ;


}
.fbody{
 position:absolute;
 left:0px; 
top:90px; 
width:100%;
 height:645px;
}
#intro{ 
left:750px;
 top:20px; 
font-family:verdana; 
font-size:30px;
 color:#000; 
font-weight:bold;
 height:75px;
 width:500px;
}
#form1{ 
top:120px;
 left:750px; 
font-family:verdana; 
font-size:20px; 
color:#1B2631; 
width:450px; 
height:495px;
}
#namebox{ 
width:200px;
 height:40px; 
border-radius:5px 5px 5px 5px;
 background:white;
 padding:10px;
 font-size:18px;
 margin-top:8px;
 border-width: 1px;
 border-style:solid; 
border-color: gray;
color:#1B2631; 
}
#userbox{
width:200px;
 height:40px; 
border-radius:5px 5px 5px 5px;
 background:white;
 padding:10px;
 font-size:18px;
 margin-top:8px;
 border-width: 1px;
 border-style:solid; 
border-color: gray;
color:#1B2631; 
}
#pwdbox{
width:200px;
 height:40px; 
border-radius:5px 5px 5px 5px;
 background:white;
 padding:10px;
 font-size:18px;
 margin-top:8px;
 border-width: 1px;
 border-style:solid; 
border-color: gray;
color:#1B2631; 
}
#cpwdbox{
width:200px;
 height:40px; 
border-radius:5px 5px 5px 5px;
 background:white;
 padding:10px;
 font-size:18px;
 margin-top:8px;
 border-width: 1px;
 border-style:solid; 
border-color: gray;
color:#1B2631; 
}
#mailbox{
 width:408px;
 height:40px;
 border-radius:5px 5px 5px 5px;
 background:white;
 padding:10px; 
font-size:18px; 
margin-top:8px;
 border-width: 1px; 
border-style:solid; 
border-color: gray;
color:#1B2631;
 }
input#submit:hover {
  background-color: #3e8e41;
   
    
}
input#submit{
padding:10px 16px;
cursor: pointer;
display:block;
color: #fff;
position:relative;
 background-color: #4CAF50;
}
input#submit:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.error{
  color: red;
}
</style>
  </head>
<body>
  <?php
$submit="";
$firstErr = $lastErr = $emailErr = $uidErr = $pwdErr = $cpwdErr= $acErr= "";
$first = $last = $email = $uid = $pwd = $cpwd= $ac= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  # code...
$grad=strip_tags($_POST['grad']);
$course=strip_tags($_POST['course']);
$section=strip_tags($_POST['section']);
$value = strip_tags($_POST['yes']);
$date= date("Y-m-d");
date_default_timezone_set('Asia/Kolkata');
$time=date("h:i:sa");

  if (empty($_POST["ac"]))
    $acErr = "Access code  is required";
   else {
    $ac = test_input($_POST["ac"]);
    // check if e-mail address is well-formed
    if ($ac!="griet") {
      $acErr = "Invalid Accesscode"; 
    }
  
  else{


  if (empty($_POST["first"])) {
    $firstErr = " FirstName is required";
  } else {
    $first = test_input($_POST["first"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$first)) {
      $firstErr = "Only letters and white space allowed"; 
    }
    else
    {
      if (strlen($first)>25) {
        # code...
        $firstErr = "Max limit:25 characters"; 
      }
    }
  }
   if (empty($_POST["last"])) {
    $lastErr = " LastName is required";
  } else {
    $last = test_input($_POST["last"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$last)) {
      $lastErr = "Only letters and white space allowed"; 
    }
    else
    {
      if (strlen($first)>25) {
        # code...
        $lastErr = "Max limit:25 characters"; 
      }
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
   if (empty($_POST["uid"])) {
    $uidErr = " UserName is required";
  } else {
    $uid = test_input($_POST["uid"]);
    //check if already username exists or not
    $connect=mysqli_connect("localhost","root","","loginsystem") or die("coudn't connect");
    $qu=mysqli_query($connect, "SELECT userid from signup where userid='$uid'");
    $re= mysqli_num_rows ( $qu );
    if ($re>0) {
      # code...
       $uidErr="This username already exists!";
    }
   }

  if (empty($_POST["pwd"])) {
    $pwdErr = " Password is required";
  } else {
    $pwd = test_input($_POST["pwd"]);
    //check if the pwd is too weak
    if (strlen($pwd)<4) {
      # code...
      $pwdErr = " Password is too weak";
    }
  }
   if (empty($_POST["cpwd"])) {
    $cpwdErr = " Password confirmation is required";
  } else {
    $cpwd = test_input($_POST["cpwd"]);
    //check if the pwd is too weak
    if ($pwd!=$cpwd) {
      # code...
       $cpwdErr = " Password do not match";
    }
  }
 if ($firstErr==""&&$lastErr==""&&$emailErr==""&&$uidErr==""&&$pwdErr==""&&$cpwdErr=="") {
   # code...
  $pwd=md5($pwd);
   if ($value=="no")
   {
  //connecting to the database
  $connect=mysqli_connect("localhost","root","","loginsystem") or die("nope");
  $sqll="insert into signup(firstname,lastname,email,userid,pwd,date,grad,course,section,time) values('$first','$last','$email','$uid','$pwd','$date','$grad','$course','$section','$time')";
          mysqli_query($connect,$sqll);
         
           header("Location: ../gun.php");

  exit();
}
else{
   $connect=mysqli_connect("localhost","root","","loginsystem") or die("nope");
         $squl="insert into signup(firstname,lastname,email,userid,pwd,date,grad,course,section,time) values('$first','$last','$email','$uid','$pwd','$date','$grad','$course','$section','$time')";
          mysqli_query($connect,$squl);
        
           
  $sqll="insert into crlogin(firstname,lastname,email,userid,pwd,date,grad,course,section) values('$first','$last','$email','$uid','$pwd','$date','$grad','$course','$section')";
          mysqli_query($connect,$sqll);
header("Location: ../gun.php");
  exit();
}
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
<div class=container>
<div id="intro" class="fbody"><H3>SIGN UP<H3></div>
<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

<div id="form1" class="fbody">
  <p><span class="error">* required field.</span></p>
  <div>
   ACCESS CODE:<input type="password" name="ac" placeholder="Accesscode" id="pwdbox" value="<?php echo $ac;?>">
<span class="error">*<br> <?php echo $acErr;?></span><br>
  </div>
  <div>
Firstname:<input type="text" name="first" placeholder="firstname" id="namebox" value="<?php echo $first;?>">
<span class="error">* <br><?php echo $firstErr;?></span><br>
</div>
<div>
Lastname:<input type="text" name="last" placeholder="lastname" id="namebox" value="<?php echo $last;?>">
<span class="error">* <br><?php echo $lastErr;?></span><br>
</div>
<p><label for="grad" >Graduation/Post Graduation:<label>
<select name="grad" >
<option value="btech">B.Tech</option>
<option value="mtech">M.Tech</option>
<option value="mba">MBA</option>
</select>
</p>
<p><label for="course" >Course:<label>
<select name="course" >
<option value="cse">CSE</option>
<option value="ece">ECE</option>
<option value="eee">EEE</option>
</select>
</p>
<p><label for="section" >Section:<label>
<select name="section" >
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
</select>
</p>
<div>
Email-Id:<input type="text" name="email" placeholder="Email-Id" id="mailbox" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span><br>
</div>
<div>
  Are you the CR:<br>
  <input type="radio" name="yes" value="no" checked>No<br>
  <input type="radio" name="yes" value="yes">Yes<br>
</div>
<div>
Username:<input type="text" name="uid" placeholder="Username" id="userbox" value="<?php echo $uid;?>">
<span class="error">* <br><?php echo $uidErr;?></span><br>
</div>
<div>
Password:<input type="password" name="pwd" placeholder="password" id="pwdbox" value="<?php echo $pwd;?>" >
<span class="error">*<br> <?php echo $pwdErr;?></span><br>
</div>
<div>
Confirm password:<input type="password" name="cpwd" placeholder="confirm password" id="cpwdbox">
<span class="error">*<br> <?php echo $cpwdErr;?></span><br>
</div>
<input type="submit"  value ="Submit"  name ="submit" id="submit"><br>
</div>
</div>
</form>
</body>
</html>
