<?PHP
	session_start();
	ob_start();
	require 'controller/dbConfig.php';
	 

	$myusername = mysqli_real_escape_string($dbCon,$_POST['myusername']);
	$mypassword= mysqli_real_escape_string($dbCon,$_POST['mypassword']);
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);

	$res = mysqli_query($dbCon,"select * from member where BINARY UserName= BINARY '$myusername' and BINARY Password= BINARY '$mypassword' and status=1");
 	if($row=mysqli_fetch_array($res)){
		$_SESSION['myusername'] = $myusername;
		header("location:index.php"); 
        mysqli_close($dbCon);
	}
	else {
		echo '<script type="text/javascript">alert("You Enter wrong user name and password. Please retry.");window.location=\'login.php\';</script>';
		ob_end_flush();
        mysqli_close($dbCon);
	}
?>
