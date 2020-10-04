<div class="col-md-4 imgContainer align-items-center">
			<img alt="Job Seeker" src="<?php echo $imagePath; ?>" class="img-thumbnail pb-2" width="auto" height="150" />
			<div class="card bg-default">
				<h5 class="card-header">
					<?php echo $_SESSION['userName']; ?>
				</h5>
				<div class="card-body">
					<p class="card-text">
						<p><?php echo $_SESSION['address1'].' '. $_SESSION['address2'].', '. $_SESSION['suburb'].', '.$_SESSION['city'].', '.$_SESSION['postcode']; ?></p>
						<p><?php echo $_SESSION['email']; ?></p>
						<p><?php echo $_SESSION['telephone']; ?></p>
						<small>
							<span class="fa fa-star <?php echo $_SESSION['rating1']; ?>"></span>
							<span class="fa fa-star <?php echo $_SESSION['rating2']; ?>"></span>
							<span class="fa fa-star <?php echo $_SESSION['rating3']; ?>"></span>
							<span class="fa fa-star <?php echo $_SESSION['rating4']; ?>"></span>
							<span class="fa fa-star <?php echo $_SESSION['rating5']; ?>"></span>
							<p><?php echo $_SESSION['rating']; ?>/5
							</p>
							
						</small>
					</p>
				</div>
				<?php if(file_exists('commentdata.php')){include('commentdata.php');} ?>
				<div class="card-footer">
					<a href="../editprofile">Edit Profile</a>
				</div>
				<div class="card-footer">
					<a href="../php/logout.php">Logout</a>
				</div>
			</div>
		</div>