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
						<div class="designation-content">
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
							<li><a href="#"><i class="icon-users4 position-left"></i> Client</a></li>
							<li class="active">Create</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Client Create</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<!-- <li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li> -->
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">

							<form class="form-horizontal" action="../controller/ClientController.php" method="post" enctype="multipart/form-data">
								<fieldset class="content-group mt-10">

									<?php
										if (isset($_GET['msg'])) {
									?>
										<div class="alert alert-success no-border">
											<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
											<span class="text-semibold">Success</span> <?php echo $_GET['msg']; ?>
										</div>
									<?php } ?>

									<div class="form-group">
										<label class="control-label col-lg-2" for="clients_name">Name</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="clients_name" name="clients_name" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2" for="designation_id">Designation</label>
										<div class="col-lg-10">
											<select name="designation_id" class="form-control" id="designation_id">
				                                <option value="">Select Designation</option>
												<?php 
												require '../controller/dbConfig.php';
												$dropdownSelectQry = "SELECT * FROM designations WHERE active_status=1";
												$designationList = mysqli_query($dbCon, $dropdownSelectQry);
													if (!empty($designationList)) { 
														foreach($designationList as $designation) { 
															echo'<option value="'.$designation['id'].'">'. $designation['designation_name'].'</option>';
												 		}
													} 
												?>
				                            </select>
										</div>
									</div>
									
									
									
									<div class="form-group">
										<label class="control-label col-lg-2" for="client_image">Image</label>
										<div class="col-lg-10">
											<input type="file" class="form-control" id="client_image" name="client_image">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2" for="client_review">Review</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="client_review" name="client_review" >
										</div>
									</div>
								</fieldset>

								<div class="text-right">
									<button type="submit" class="btn btn-primary" name="saveClient">Submit</button>
									<a href="clientList.php" class="btn btn-default">Back To List </a>
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
