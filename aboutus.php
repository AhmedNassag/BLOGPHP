<?php
  include('includes/header.php');
  include('includes/navbar.php');
?>



<div class="container py-5">
	<div class="row py-3">
		
		<div class="col-md-8">
			<div class="card">
				<img src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg" class="card-img-top" alt="img">
				<div class="card-body">

					<?php 
						require ('admin/includes/database/dbconfig.php');

						$query 	   = "SELECT * FROM abouts";
						$query_run = mysqli_query($connection,$query);

						if (mysqli_num_rows($query_run) > 0)
						{
							foreach ($query_run as $row)
							{
					?>

								<h5 class="card-title"> <?php echo $row['title']; ?> </h5>
								<h6> <?php echo $row['subtitle']; ?> </h6>
								<p class="card-text"> <?php echo $row['description']; ?> </p>
								<a href="<?php echo $row['links'];?>" class="btn btn-primary">Go</a>

					<?php
							}
						}
						else
						{
							echo "No Record Found";
						}
					?>

				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h2 class="card-title">Notice..!</h2>
					<p class="card-text">this is our notice</p>
					<a href="#" class="btn btn-primary">>Go</a>
				</div>
			</div>
			<hr>
			<div class="card">
				<div class="card-body">
					<h2 class="card-title">Notice..!</h2>
					<p class="card-text">this is our notice</p>
					<a href="#" class="btn btn-primary">>Go</a>
				</div>
			</div>
		</div>

	</div>
</div>



<?php
  include('includes/footer.php');
?>