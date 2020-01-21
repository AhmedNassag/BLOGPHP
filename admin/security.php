<?php

	session_start();
	include('includes/database/dbconfig.php');

	if ($db_config)
	{
		//echo "Database Connected";
	}
	else
	{
		//header('Location: database/dbconfig');
	}
	
	if(!$_SESSION['username'])
	{
		header('Loaction: login.php');
	}

?>