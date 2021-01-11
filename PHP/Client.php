<html>

<head>
<link rel="stylesheet" type="text/css" href=..css\pet.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php 
$id =0;
$id2 =0;
$fname='';
$lname='';
$email='';
$phone='';
$bname='';
if (isset($_REQUEST['SubmitClient']))
{
	$FirstName = $_REQUEST['FirstName'];
	$LastName = $_REQUEST['LastName'];
	$Email = $_REQUEST['Email'];
	$Phone = $_REQUEST['Phone'];
	$BuisnessName = $_REQUEST['BuisnessName'];
	if($FirstName== ""){$fname="Please enter this field";}
	if($LastName== ""){$lname="Please enter this field";}
	if($Email== ""){$email="Please enter this field";}
	if($Phone== ""){$phone="Please enter this field";}
	if($BuisnessName== ""){$bname="Please enter this field";}	

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ $email= "Invalid Email";}
	if(!preg_match("/^[0-9]{10}$/", $phone)){$phone = "Invalid Phone Number";}

	if($FirstName!= "" && $LastName!= "" && $Email!= "" &&  $Phone!= "" && $BuisnessName!= "" )
	{

	$conn = mysqli_connect('uta.cloud','gudavall_myroot','v}W!HS%p?e5?','gudavall_petstore');
	if(!$conn)
	{
		die("Error: There was some problem with the connection");
	}
	$sql = "insert into users values('','$Email','1234567','client')";
	if(mysqli_query($conn,$sql))
	{
		$id = mysqli_insert_id($conn);
		$sql2 = "select * from users where user_name = '$Email'";
		$result = mysqli_query($conn,$sql2);
		while($row = mysqli_fetch_assoc($result))
		{
			$id  = $row['user_id'];
		}
	}
	else{
		echo "The user name already exists in users";
	}

	$sql3 = "insert into clients values('','$FirstName','$LastName','$Phone','$Email','$id')";
	if(mysqli_query($conn,$sql3))
	{
		$id2 = mysqli_insert_id($conn);
		$sql4 = "select *from clients where client_emailid = '$Email'";
		$result2 = mysqli_query($conn,$sql4);
		while($row = mysqli_fetch_assoc($result2))
		{
			$id2 = $row['client_id'];
		}
	}
	else
	{
		echo "User already exists in clients";
	}

	$sql5 = "insert into business values('','$BuisnessName','','$id2')";
	if(mysqli_query($conn,$sql5))
	{
		echo "User Registered Succesfully";
		mail($Email,"My Pet Store", "You have registered Succesfully. Your password is 1234567","From:abc@gmail.com");
	}
	else
	{
		echo "Error";
	}
}
}

?>

<title> Client's Pet Store </title>

<div id="wrapper">

<h1> Client's Pet Store </h1>
<body>

	<div id="navbar">
	  <div id="innernavbar">
	<nav>
	</br>

    </nav>
	  </div>
	</div>

	<div id="container">
	<div id="content">
	  <div id="innercontent">
		<img src="client_background.png" style="width:100%;height:45%;padding:0;margin:0;">
		<div id="x">
		<h3>My Pet </h3>
		<p>
		Required information is marked with an asterisk (*).

			<form>
		  *First Name:     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
		 <input type="text" name="FirstName">
		 <label style="color:red"> 
		 	<?php  echo $fname; ?>
		 </label> <br>

		  *Last Name:      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 
		   <input type="text" name="LastName">
		    <label style="color:red">  
		 	<?php  echo $lname; ?>
		 </label><br>

		   *Email:    &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;
		 <input type="text" name="Email">
		 <label style="color:red">  
		 	<?php  echo $email; ?>
		 </label><br>

		    Phone:    &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;&nbsp; &nbsp; 
		 <input type="text" name="Phone">
		  <label style="color:red">  
		 	<?php  echo $phone; ?>
		 </label><br>
		
		   Buisness Name:    &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
		 <input type="text" name="BuisnessName">
		 <label style="color:red"> 
		 	<?php  echo $bname; ?>
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