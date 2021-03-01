<?php
	session_start();
	$uname = $_POST['username'];
	$password = md5($_POST['password']);
	$ActiveUser = '';
	include_once('config.php');
	
	if(!empty($uname) && ($uname == "an16638"  || $uname == "192.168.0.1")){
			$_SESSION['user'] = $ActiveUser;
			echo "<br/> Login Bypass and your secret <br/>"; 
			echo base64_decode("WW91IGhhdmUgcmVhY2hlZCBLcmlzaG5hJ3MgcGFnZQ==");
			echo "<br/>" ;
			echo base64_encode("I am encoding from Krishna's Page"); 
			echo "<br/>" ;
			echo "Click <a href='/xvwa/'>Here</a> to bypass Login";

			//header("Location: www.google.com");
	}	
	else
	{
		$sql = "select username from users where username=:username and password=:password";
		$stmt = $conn1->prepare($sql);
		$stmt->bindParam(':username',$uname);
		$stmt->bindParam(':password',$password);
		$stmt->execute();
		while($rows = $stmt->fetch(PDO::FETCH_NUM)){
			$ActiveUser = $rows[0];
		}
		if(!empty($ActiveUser)){
			$_SESSION['user'] = $ActiveUser;
		}
			header("Location: /xvwa/");
	}
	
	
?>
