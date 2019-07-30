<?php
 $uidErr = $pwdErr = "";
$uid = $pwd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  # code...
session_start();
$_SESSION['logged_in']=1;
 $uid=strip_tags($_POST['uid']);
$pwd=strip_tags($_POST['pwd']);
  $grad=strip_tags($_POST['grad']);
  $course=strip_tags($_POST['course']);
  $section=strip_tags($_POST['section']);
  if (empty($_POST["uid"])) 
    $uidErr = " UserName is required";
   else 
    $uid = test_input($_POST["uid"]);
if (empty($_POST["pwd"])) 
    $pwdErr = " Password is required";
   else 
    $pwd = test_input($_POST["pwd"]);  
    if($uidErr==""&&$pwdErr==""){
  $connect=mysqli_connect("localhost","root","","loginsystem") or die("nope");
  $qu=mysqli_query($connect, "SELECT * from crlogin where userid='$uid'");
  $re= mysqli_num_rows ( $qu );
  if ($re>0) {
  	# code...
  	while ($row=mysqli_fetch_assoc($qu)) {
  		# code...
  		$dbuid=$row['userid'];
  		$dbpwd=$row['pwd'];
      $dbgrad=$row['grad'];
      $dbcourse=$row['course'];
      $dbsection=$row['section'];
  	}
  }

  
  $pwds=md5($pwd);
  if ($uid==$dbuid&&$pwds==$dbpwd&&$dbgrad==$grad&&$dbcourse==$course&&$dbsection==$section) {
  	# code...
    if ($grad=="btech") {
      # code...
      if ($course=="cse") {
        # code...
        if ($section=="a") {
          # code...
          $l=date("l");
          if ($l=="Monday") 
            # code...
             header("Location: ../new/mon.php");
          elseif ($l=="Tuesday") {
            # code...
            header("Location: ../new/tue.php");
          }
          elseif ($l=="Wednesday") {
            # code...
            header("Location: ../new/wed.php");
          }
         elseif ($l=="Thursday") {
           # code...
          header("Location: ../new/thu.php");
         }
         elseif ($l=="Friday") {
           # code...
          header("Location: ../new/fri.php");
         }
         elseif ($l=="Saturday") {
           # code...
          header("Location: ../new/sat.php");
         }
        }
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

<html>
<style>

form{
color:#1B2631;

font-size:19px;
margin:auto;

box-sizing:border-box;
font-family:"Lucida Sans Unicode";
padding:0px 30px 240px 210px;
 
}
body{
 background-color:#FEF9E7;
}
h3{
display:block;
padding:20px 0px 0px 0px;
 color:#17202A;
    text-shadow: 2px 2px 4px #BFC9CA;
}

.container{
background:url(" ../new/c.JPG")  no-repeat center center fixed;
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

#userbox{
width:100%;
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
width:100%;
 
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
.val_error{
  color: red;
}
img {
    position: absolute;
top:65px;
    left: 275px;
    display: block;
    
}
.error{
  color: red;
}

input#submit:hover {
  background-color: #4CAF50; /* Green */
    color: white;
    
}
</style>
<body>
<img src="../new/logo.png" alt="Forest" width="400" height="400">
<div class=container>
<div id="intro" class="fbody"><H3>LOG IN<H3></div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<div id="form1" class="fbody">
<div>
Username:<span class="error">* <input type="text" placeholder="Enter Username" name="uid" id="userbox" value="<?php echo $uid;?>">
<br><?php echo $uidErr;?></span>
</div>
<div>
Password:<span class="error">*<input type="password" placeholder="Enter Password" id="pwdbox" name="pwd" >
<br> <?php echo $pwdErr;?></span>
</div>
<div>
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
</div>
<input type="submit"  value ="submit"  name ="submit" id="submit"><br>
</div>
</div>
</form>
</body>
</html>
