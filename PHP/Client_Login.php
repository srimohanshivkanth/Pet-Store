<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="..css/pet.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
$id = 0;
$cname='';
$mypet='';
if(isset($_SESSION['client_id']))
{
	if(isset($_REQUEST['SubmitClient']))
	{
	$ClientName = $_REQUEST['ClientName'];
	$MyPet = $_REQUEST['MyPet'];
	if($ClientName== ""){$cname="Please enter this field";}
	if($MyPet== ""){$mypet="Please enter this field";}
	if($ClientName!= "" && $MyPet!= "" )
	{
	$conn = mysqli_connect('uta.cloud','gudavall_myroot','v}W!HS%p?e5?','gudavall_petstore');
	if(!$conn)
	{
		die("Error: There was some problem with the connection");
	}
	if($MyPet!='')
	{
		$id = $_SESSION['client_id'];
		$sql = "insert into pet values('','$MyPet','$ClientName',$id)";
		if(mysqli_query($conn,$sql))
		{
			echo "Added a new pet";
		}
		else
		{
			echo " Error:";
		}
	}     
	else
	{
		echo "My Pet is not entered";
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
		  Client Name:    &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; 
		 <input type="text" name="ClientName"><br>
		  <label style="color:red"> 
		 	<?php  echo $cname; ?>
		 </label> <br> 

		  *My Pet:  &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;&nbsp; 
		   <input type="text" name="MyPet"><br>
		    <label style="color:red"> 
		 	<?php  echo $mypet; ?>
		 </label> <br>

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