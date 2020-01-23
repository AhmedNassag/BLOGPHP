<?php
	include('security.php');
	include('includes/database/dbconfig.php');

	if (isset($_POST['signup']))
	{
		$fname     = $_POST['fname'];
		$lname     = $_POST['lname'];
		$email 	   = $_POST['email'];
		$password  = $_POST['password'];
		$cpassword = $_POST['cpassword'];
	
		if($password == $cpassword)
		{
			$query     = "SELECT * FROM register WHERE email = '$email' ";
			$query_run = mysqli_query($connection,$query);

			if(mysqli_num_rows($query_run) > 0)
			{
				$_SESSION['status'] = "This Email Already Exsists";
				header('location: signup.php');
			}
			else
			{
				$query 	   = "INSERT INTO register (email,
												    password,
												    fname,
												    lname,
												    usertype)
				  					        VALUES ('$email',
				  					      		    '$password',
				  					    		    '$fname',
				  					    		    '$lname',
				  					    		    'user')";
				$query_run = mysqli_query($connection,$query);

				if($query_run)
				{
					$_SESSION['username']  = $fname.' '.$lname;
					header('location: ../index.php');
				}
				else
				{
					$_SESSION['status'] = "Sorry,Your Registration Failed";
					header('Location: signup.php');
				}
			}
		}
		else
		{
			$_SESSION['status'] = "Your Email Or Password Is Invalid";
			header('Location: signup.php');
		}
	}
?>