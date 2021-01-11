<?php
session_start();
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/pet.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<?php 
$id=0;
$id2 = 0;
$role=0;
$email='';
$password='';
if(isset($_REQUEST['SubmitClient']))
{
	$Email = $_REQUEST['Email'];
	$Password = $_REQUEST['Password'];
	if($Email== ""){$email="Please enter this field";}
	if($Password== ""){$password="Please enter this field";}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ $email= "Invalid Email";}
	if($Email!= "" && $Password!= "" )
	{
	$conn = mysqli_connect('uta.cloud','gudavall_myroot','v}W!HS%p?e5?','gudavall_petstore');

	if(!$conn)
	{
		die("Error: There was some problem with the connection");
	}
	$sql = "select *from users where user_name='$Email' and password = '$Password'";
	$result = mysqli_query($conn,$sql); 
	if(mysqli_num_rows($result)!=0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			$id = $row['user_id'];		
			$role = $row['user_roletype'];	
		}
		$sql2 = "select *from clients where user_id = $id";
		$result2 = mysqli_query($conn,$sql2);
		while($row=mysqli_fetch_assoc($result2))
		{
			$id2 = $row['client_id'];		
		}
		if($role == "client")
		{
			$_SESSION['client_id'] = $id2;
			header("Location:Client_Login.php");

		}
		else
		{
			$_SESSION['business_id'] = $id2;
			header("Location:Buisness_Login.php");
		}
	}
	else
	{
		echo "Invalid username or password";
	}

	}
}


?>


<title> Client's Pet Store </title>

<div id="wrapper">

<h1>Pet Store </h1>
<body>

	<div id="navbar">
	  <div id="innernavbar">
	  <nav>
	  </br>
<a style="text-decoration:none" href="Index.php">Home</a> </br>
	  <a style="text-decoration:none" href="AboutUs.php">About Us</a></br>
	  <a style="text-decoration:none" href="ContactUs.php">Contact Us</a></br>
	  <a style="text-decoration:none" href="Client.php">Client</a></br>
	  <a style="text-decoration:none" href="Service.php">Service</a></br>
	  <a style="text-decoration:none" href="Login.php">Login</a></br>
	  
	  </nav>
	  </div>
	</div>

	<div id="container">
	<div id="content">
	  <div id="innercontent">
		<img src="client_background.png" style="width:100%;height:45%;padding:0;margin:0;"> 
		<div id="x">
		<h3>Login </h3>
		<p>
		Required information is marked with an asterisk (*).

		<form>


		   *Email:    &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;
		 <input type="text" name="Email">
		 <label style="color:red">  
		 	<?php  echo $email; ?>
		 </label><br>


		   *Password:    &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
		 <input type="text" name="Password">
		 <label style="color:red"> 
		 	<?php  echo $password; ?>
		 </label><br>
		 
		 <input type="Submit" value="Submit" name="SubmitClient">
		 
		</form>

		</p>

		<footer>
		  <p>Copyright &copy; 2018 Pet Store </br>
		  <a href="mailto:shrimohanshivakanth@gudavalli.com"><u><i>shrimohanshivakanth@gudavalli.com</i></u></a></p>
		</footer>
		</div>
	  </div>
	</div>
	</div>
</body> 
</html>