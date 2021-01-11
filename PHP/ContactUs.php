<html>

<head>
<link rel="stylesheet" type="text/css" href="..css/pet.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php  
$fname='';
$lname='';
$email='';
$phone='';
$comments='';
if (isset($_REQUEST['SubmitClient']))
{
	$FirstName = $_REQUEST['FirstName'];
	$LastName = $_REQUEST['LastName'];
	$Email = $_REQUEST['Email'];
	$Phone = $_REQUEST['Phone'];
	$Comments = $_REQUEST['Comments'];
	if($FirstName== ""){$fname="Please enter this field";}
	if($LastName== ""){$lname="Please enter this field";}
	if($Email== ""){$email="Please enter this field";}
	if($Phone== ""){$phone="Please enter this field";}
	if($Comments== ""){$comments="Please enter this field";}	

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ $email= "Invalid Email";}
	if(!preg_match("/^[0-9]{10}$/", $phone)){$phone = "Invalid Phone Number";}

	if($FirstName!= "" && $LastName!= "" && $Email!= "" &&  $Phone!= "" && $Comments!= "" )
	{
	$conn = mysqli_connect('uta.cloud','gudavall_myroot','v}W!HS%p?e5?','gudavall_petstore');
	if(!$conn)
	{
		die("Error: There was some problem with the connection");
	}
	$sql = "insert into contactus values('','$FirstName','$LastName','$Email','$Phone','$Comments')";
	mysqli_query($conn,$sql);
	mail($Email,"My Pet Store", "Thanks for your interest in out petstore. Our assistant will be contacting you soon");
}
}
?>

<title> Client's Pet Store </title>

<div id="wrapper">

<h1> Pet Store </h1>
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
		<img src="contact.png" style="width:100%;height:45%;padding:0;margin:0;">
		<div id="x">
		<h3>Contact Us </h3>
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
		 <input type="text" name="Comments">
		 <label style="color:red"> 
		 	<?php  echo $comments; ?>
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