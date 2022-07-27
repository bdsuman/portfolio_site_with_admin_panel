<!DOCTYPE html>
<html lang="en">
<?php
	if (basename(__DIR__) != 'admin') {
		$baseUrl = '../';
		$isInternal = true;
	} else {
		$baseUrl = '';
		$isInternal = false;
	}
 	include '../includes/head.php'; 
?>
<body>

	<?php include '../includes/mainNav.php'; ?>

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?php echo $isInternal == true ? '../': ' ';?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Victoria Baker</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->
					<?php $manuName = basename(__DIR__); ?>
					<?php include '../includes/navigation.php'; ?>

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="#"><i class="icon-bubble2 position-left"></i> Contact</a></li>
							<li class="active">Update</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Contact Update</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<!-- <li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li> -->
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<?php 
								require '../controller/dbConfig.php';
								$contact_id = $_GET['contact_id'];
								$getSingleDataQry = "SELECT * FROM contact_us WHERE id={$contact_id}";
								$getResult = mysqli_query($dbCon, $getSingleDataQry);
							?>
							<form class="form-horizontal" action="../controller/ContactController.php" method="post" enctype="multipart/form-data">
								<fieldset class="content-group mt-10">

									<?php
										if (isset($_GET['msg'])) {
									?>
										<div class="alert alert-success no-border">
											<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
											<span class="text-semibold">Success</span> <?php echo $_GET['msg']; ?>
										</div>
									<?php } ?>


									<?php
										foreach ($getResult as $key => $contact) {
									?>
										<input type="hidden" class="form-control" name="contact_id" value="<?php echo $contact['id']; ?>">

										<div class="form-group">
											<label class="control-label col-lg-2" for="contact_topic">Topic</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="contact_topic" name="contact_topic"  value="<?php echo $contact['contact_topic']; ?>">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-2" for="contact_details">Details</label>
											<div class="col-lg-10">
												<textarea rows="5" cols="5" class="form-control" placeholder="Default textarea" id="contact_details" name="contact_details" ><?php echo $contact['contact_details']; ?></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-2" for="icon_name">Icon Name</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="icon_name" name="icon_name"  value="<?php echo $contact['icon_name']; ?>">
											</div>
										</div>

										
										
									<?php } ?>
								</fieldset>

								<div class="text-right">
									<button type="submit" class="btn btn-primary" name="updateContact">Submit</button>
									<a href="contactList.php" class="btn btn-default">Back To List </a>
								</div>
							</form>
						</div>

						
					</div>
					<!-- /basic datatable -->

					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	<?php include '../includes/script.php'; ?>
</body>
</html>
