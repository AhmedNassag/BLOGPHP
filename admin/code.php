<?php
	include('security.php');
	include('includes/database/dbconfig.php');

	if(isset($_POST['registerbtn']))
	{
		$username  = $_POST['username'];
		$email     = $_POST['email'];
		$password  = $_POST['password'];
		$cpassword = $_POST['confirmpassword'];
		$usertype  = $_POST['usertype'];

		if($password === $cpassword)
		{
			$query = "INSERT INTO register (username,
											email,
											password,
											usertype)
				  				    	VALUES 
				  							('$username',
				  						 	'$email',
				  						 	'$password',
				  						 	'$usertype')";

			$query_run = mysqli_query($connection,$query);

			if($query_run)
			{
				//echo "Saved"
				$_SESSION['success'] = "Admin Profile Added";
				header('Location: register.php');
			}
			else
			{
				$_SESSION['status'] = "Admin Profile Not Added";
				header('Location: register.php');
			}
		}

		else
		{
			$_SESSION['status'] = "Password And Confirm Password Does Not Match";
			header('Location: register.php');
		}	
	}





	if(isset($_POST['updatebtn']))
	{
		$id 	   		= $_POST['edit_id'];
		$username  		= $_POST['edit_username'];
		$email 	   		= $_POST['edit_email'];
		$password  	    = $_POST['edit_password'];
		$usertypeupdate = $_POST['update_usertype'];

		$query	 	    = "UPDATE register SET username = '$username',
											   email    = '$email',
											   password = '$password'
											   usertype = '$usertypeupdate'
										   WHERE
											   id 	     = '$id' ";
		$query_run      = mysqli_query($connection,$query);

		if($query_run)
		{
			$_SESSION['success'] = "Your Data IS Updated";
			header('Location: register.php');
		}
		else
		{
			$_SESSION['status'] = "Your Data IS Not Updated";
			header('Location: register.php');
		}
	}






	if (isset($_POST['delete_btn']))
	{
		$id 	   = $_POST['delete_id'];
		$query     = "DELETE FROM register WHERE id = '$id' ";
		$query_run = mysqli_query($connection,$query);

		if ($query_run)
		{
			$_SESSION['success'] = "Your Data Is Deleted";
			header('Location: register.php');
		}
		else
		{
			$_SESSION['status'] = "Your Data Is Not Deleted";
			header('Location: register.php');
		}
	}





	if(isset($_POST['update_btn']))
	{
		$id 		 = $_POST['edit_id'];
		$title 	   	 = $_POST['edit_title'];
		$subtitle  	 = $_POST['edit_subtitle'];
		$description = $_POST['edit_description'];
		$links  	 = $_POST['edit_links'];
		$query	 	 = "UPDATE abouts Set title 	  = '$title',
										  subtitle    = '$subtitle',
										  description = '$description',
										  links 	  = '$links'
									WHERE
										  id 		  = '$id' ";

		$query_run 	 = mysqli_query($connection,$query);

		if ($query_run)
		{
			$_SESSION['success'] = "Your Data Updated";
			header('Location: aboutus.php');
		}
		else
		{
			$_SESSION['status'] = "Your Data Not Updated";
			header('Location: aboutus.php');
		}
	}





	if(isset($_POST['about_delete_btn']))
	{
		$id 	   = $_POST['delete_id'];
		$query	   = "DELETE FROM abouts WHERE id = '$id' ";
		$query_run = mysqli_query($connection,$query);

		if ($query_run)
		{
			$_SESSION['success'] = "Your Data Deleted";
			header('Location: aboutus.php');
		}
		else
		{
			$_SESSION['status'] = "Your Data Not Deleted";
			header('Location: aboutus.php');
		}
	}





	if(isset($_POST['about_save']))
	{
		$title 	   	 = $_POST['title'];
		$subtitle  	 = $_POST['subtitle'];
		$description = $_POST['description'];
		$links  	 = $_POST['links'];
		$query	 	 = "INSERT INTO abouts (title,
											subtitle,
											description,
											links)
										VALUES 
										   ('$title',
											'$subtitle',
											'$description',
											'$links')";

		$query_run 	 = mysqli_query($connection,$query);

		if ($query_run)
		{
			$_SESSION['success'] = "About Us Added";
			header('Location: aboutus.php');
		}
		else
		{
			$_SESSION['status'] = "About Us Not Added";
			header('Location: aboutus.php');
		}
	}





	if (isset($_POST['save_faculty']))
	{
		$name 		 = $_POST['faculty_name'];
		$designation = $_POST['faculty_designation'];
		$description = $_POST['faculty_description'];
		$images		 = $_FILES["faculty_image"]['name'];

		if(file_exists("upload/".$_FILES["faculty_image"]["name"]))
		{
			$store 				= $_FILES["faculty_image"]["name"];
			$_SESSION['status'] = "Image Already Exists. '.$store.'";
			header('Location: faculty.php');
		}
		else
		{
			$query 		 = "INSERT INTO faculty (name,
												 designation,
												 description,
												 images)
											VALUES  
												('$name',
												 '$designation',
												 '$description',
												 '$images')";
			$query_run	 = mysqli_query($connection,$query);

			if ($query_run)
			{
				move_uploaded_file($_FILES["faculty_image"]["tmp_name"],"upload/".$_FILES["faculty_image"]["name"]);
				$_SESSION['success'] = "Faculty Added";
				header('Location: faculty.php');
			}
			else
			{
				$_SESSION['status'] = "Faculty Not Added";
				header('Location: faculty.php');
			}
		}
	}





	if(isset($_POST['faculty_update_btn']))
	{
		$edit_id 			= $_POST['edit_id'];
		$edit_name 			= $_POST['edit_name'];
		$edit_designation   = $_POST['edit_designation'];
		$edit_description   = $_POST['edit_description'];
		$edit_faculty_image = $_FILES["faculty_image"]['name'];
		$query  			= "UPDATE faculty SET name 		  = '$edit_name',
												  designation = '$edit_designation',
												  description = '$edit_description',
												  images 	  = '$edit_faculty_image'
											WHERE 
												  id 		  = '$edit_id' ";
		$query_run 			= mysqli_query($connection,$query);

		if($query_run)
		{
			move_uploaded_file($_FILES["faculty_image"]["tmp_name"],"upload/".$_FILES["faculty_image"]["name"]);
			$_SESSION['success'] = "Faculty Updated";
			header('Location: faculty.php');
		}
		else
		{
			$_SESSION['status'] = "Faculty Not Updated";
			header('Location: faculty.php');
		}
	}





	if(isset($_POST['faculty_delete_btn']))
	{
		$id 	   = $_POST['delete_id'];
		$query 	   = "DELETE FROM faculty WHERE id = '$id'";
		$query_run = mysqli_query($connection,$query);

		if($query_run)
		{
			$_SESSION['success'] = "Faculty Data Is Deleted";
			header('Location: faculty.php');
		}
		else
		{
			$_SESSION['status'] = "Faculty Data Is Not Deleted";
			header('Location: faculty.php');
		}
	}




	if(isset($_POST['search_data']))
	{
		$id = $_POST['id'];
		$visible = $_POST['visible'];
		$query = "UPDATE faculty SET visible = '$visible' WHERE id = '$id' ";
		$query_run = mysqli_query($connection,$query);
	}
	if(isset($_POST['delete_multiple_data']))
	{
		$id = "1";
		$query = "DELETE FROM faculty WHERE visible = '$id' ";
		$query_run = mysqli_query($connection,$query);

		if($query_run)
		{
			$_SESSION['success'] = "Your Data Is Deleted";
			header('Location: faculty.php');
		}
		else
		{
			$_SESSION['status'] = "Your Data Is Not Deleted";
			header('Location: faculty.php');
		}
	}





	if(isset($_POST['dept_save']))
	{
		$name 		 = $_POST['name'];
		$description = $_POST['description'];
		$image  	 = $_FILES['dept_image']['name'];

		if(file_exists('upload/departments/'.$_FILES['dept_image']['name']))
		{
			$store 				= $_FILES['dept_image']['name'];
			$_SESSION['status'] = "Image Already Exists. '.$store.'";
			header('Location: departments.php');
		}
		else
		{
			$query 	   = "INSERT INTO dept_category (name,
										       		 description,
										       		 image)
									    		VALUES 
										      		('$name',
										       		 '$description',
										       		 '$image') ";
			$query_run = mysqli_query($connection,$query);

			if($query_run)
			{
				move_uploaded_file($_FILES["dept_image"]["tmp_name"],"upload/departments/".$_FILES["dept_image"]["name"]);
				$_SESSION['success'] = "Departments Category Added";
				header('Location: departments.php');
			}
			else
			{
				$_SESSION['status'] = "Departments Category Not Added";
				header('Location: departments.php');
			}
		}
	}





	if(isset($_POST['dept_list_save']))
	{
		$dept_category_id = $_POST['dept_cate_id'];
		$name 		 	  = $_POST['name'];
		$description 	  = $_POST['description'];
		$section  	 	  = $_POST['section'];
		$query 	   		  = "INSERT INTO dept_category_list (dept_category_id,
															 name,
										       		    	 description,
										       		    	 section)
									    				VALUES 
										      		    	('$dept_category_id',
										      		    	 '$name',
										       		    	 '$description',
										       		    	 '$section') ";
		$query_run 		  = mysqli_query($connection,$query);

		if($query_run)
		{
			$_SESSION['success'] = "Departments Category List Added";
			header('Location: departments-list.php');
		}
		else
		{
			$_SESSION['status'] = "Departments Category List Not Added";
			header('Location: departments-list.php');
		}
	}





	if(isset($_POST['dept_cate_update_btn']))
	{
		$update_id 			= $_POST['update_id'];
		$update_name 		= $_POST['update_name'];
		$update_description = $_POST['update_description'];
		$dept_cate_image 	= $_FILES["dept_cate_image"]['name'];
		$query  			= "UPDATE dept_category SET name 		= '$update_name',
												  		description = '$update_description',
												  		image 	  	= '$dept_cate_image'
													WHERE 
												  		id 		  	= '$update_id' ";
		$query_run 			= mysqli_query($connection,$query);

		if($query_run)
		{
			move_uploaded_file($_FILES["dept_cate_image"]["tmp_name"],"upload/departments/".$_FILES["dept_cate_image"]["name"]);
			$_SESSION['success'] = "Departments Category Updated";
			header('Location: departments.php');
		}
		else
		{
			$_SESSION['status'] = "Departments Category Not Updated";
			header('Location: departments.php');
		}
	}





	if(isset($_POST['dept_cate_delete_btn']))
	{
		$delete_id = $_POST['delete_id'];
		$query 	   = "DELETE FROM dept_category WHERE id = '$delete_id' ";
		$query_run = mysqli_query($connection,$query);

		if($query_run)
		{
			$_SESSION['success'] = "Department Category Is Deleted";
			header('Location: departments.php');
		}
		else
		{
			$_SESSION['status'] = "Department Category Is Not Deleted";
			header('Location: departments.php');
		}
	}





	if(isset($_POST['dept_list_update_btn']))
	{
		$update_id    = $_POST['update_id'];
		$dept_category_id = $_POST['dept_category_id'];
		$name 		  = $_POST['name'];
		$description  = $_POST['description'];
		$section 	  = $_POST['section'];
		$query 	   	  ="UPDATE dept_category_list SET dept_category_id = '$dept_category_id',
								   				      name 		   = '$name',
								    				  description  = '$description',
								   					  section      = '$section'
								   				  WHERE 
								   					  id 		   = '$update_id' ";
		$query_run 	  = mysqli_query($connection,$query);

		if($query_run)
		{
			$_SESSION['success'] = "Department Category List Is Updated";
			header('Location: departments-list.php');
		}
		else
		{
			$_SESSION['status'] = "Department Category List Is Not Updated";
			header('Location: departments-list.php');
		}
	}





	if(isset($_POST['dept_list_delete_btn']))
	{
		$delete_id = $_POST['delete_id'];
		$query 	   = "DELETE FROM dept_category_list WHERE id = '$delete_id' ";
		$query_run = mysqli_query($connection,$query);

		if($query_run)
		{
			$_SESSION['success'] = "Department List Is Deleted";
			header('Location: departments-list.php');
		}
		else
		{
			$_SESSION['status'] = "Department List Is Not Deleted";
			header('Location: departments-list.php');
		}
	}
	
?>