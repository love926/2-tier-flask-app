<?php

$conn = new mysqli("database-13.cn04ekcyuel1.us-east-2.rds.amazonaws.com","admin","Ali123456^","myappdb");

if($conn->connect_error){
die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password_hash) VALUES ('$username', '$password_hash')";

if($conn->query($sql) === TRUE){
?>

<!DOCTYPE html>
<html>
<head>
<title>Account Created</title>

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
border:3px solid #00d9ff;
}

h2{
margin-bottom:10px;
}

p{
color:#bcd;
margin-bottom:25px;
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

<h2>Account Created Successfully 🎉</h2>

<p>Welcome <?php echo htmlspecialchars($username); ?>  
Your account is ready.</p>

<a href="portfolio.html">
<button>Login Now</button>
</a>

</div>

</body>
</html>

<?php

}else{
echo "Error: " . $conn->error;
}

$conn->close();

?>
