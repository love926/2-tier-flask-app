<?php

$conn = new mysqli("database-13.cn04ekcyuel1.us-east-2.rds.amazonaws.com","admin","Ali123456^","myappdb");

if($conn->connect_error){
die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if($result->num_rows == 1){

$row = $result->fetch_assoc();

if(password_verify($password,$row['password_hash'])){

header("Location: portfolio.html");
exit();

}

}

?>

<!DOCTYPE html>
<html>
<head>
<title>Login Failed</title>

<style>

body{
margin:0;
font-family:Arial;
background:#07182e;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
color:white;
}

.box{
background:#0d253f;
padding:40px;
border-radius:12px;
text-align:center;
width:400px;
box-shadow:0 0 25px rgba(0,255,255,0.3);
}

img{
width:120px;
height:120px;
border-radius:50%;
margin-bottom:20px;
border:3px solid #ff4d4d;
}

h2{
color:#ff4d4d;
}

button{
padding:12px 25px;
background:#00d9ff;
border:none;
border-radius:6px;
font-weight:bold;
cursor:pointer;
}

button:hover{
background:#00a7c2;
}

</style>

</head>

<body>

<div class="box">

<img src="profile.jpg">

<h2>Invalid Username or Password ❌</h2>

<p>Please check your login details and try again.</p>

<a href="index.html">
<button>Try Again</button>
</a>

</div>

</body>

</html>
