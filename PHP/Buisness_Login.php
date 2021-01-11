<?php
session_start();
?>
<html>

<head>
<link rel="stylesheet" type="text/css" href="..css\pet.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
$id = 0;
$bname='';
$service='';
if(isset($_SESSION['business_id']))
{
	if(isset($_REQUEST['SubmitClient']))
	{

	$ClientName = $_REQUEST['BusinessName'];
	$MyPet = $_REQUEST['Service'];
	if($BusinessName== ""){$bname="Please enter this field";}
	if($Service== ""){$service="Please enter this field";}
	if($BusinessName!= "" && $Service!= "" )
	{
	$conn = mysqli_connect('uta.cloud','gudavall_myroot','v}W!HS%p?e5?','gudavall_petstore');
	if(!$conn)
	{
		die("Error: There was some problem with the connection");
	}
	if($MyPet!= '')
	{

		$id = $_SESSION['business_id'];
		$sql = "insert into business values('','$MyPet','$ClientName',$id)";
		if(mysqli_query($conn,$sql))
		{
			echo "Added a new business";
		}
		else
		{
			echo " Error:";
		}
	}     
	else
	{
		echo "Serive name is not entered";
	}
}
}

else
{
	header("Location:Login.php");
}
}
?>
<title> Client's Pet Store </title>

<div id="wrapper">

<h1> Business's Pet Store </h1>
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
		<h3>My Business</h3>
		<p>
		Required information is marked with an asterisk (*).

		<form>
		   
		   Business Name:    &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp;  &nbsp; &nbsp;&nbsp;&nbsp;
		 <input type="text" name="BusinessName"><br>
		  <label style="color:red">  
		 	<?php  echo $bname; ?>
		 </label><br>

		   *Service:    &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  
		 <input type="text" name="Service"><br>
		 <label style="color:red">  
		 	<?php  echo $service; ?>
		 </label><br>
		 
		 <input type="Submit" value="Add New One" name="SubmitClient">
		 
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