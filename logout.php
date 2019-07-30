<!DOCTYPE html>
<html>
<head><title>
logout
</title>
<style>
img {
    opacity: 0.5;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
p{
	text-align:center;
	font-size:40px;
	font-family:"Lucida Sans Unicode";
}
<?php
session_start();
session_destroy();
echo"please login to continue";

?>
</style></head>
<body>
<img src="../new/sm.jpg" alt="Forest" width="400" height="400">
<p>PLEASE LOGIN TO CONTINUE!</p>
</body>