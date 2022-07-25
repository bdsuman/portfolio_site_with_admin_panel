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
							<li><a href="#"><i class="icon-theater position-left"></i> Staff</a></li>
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
							<h5 class="panel-title">Staff Update</h5>
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
								$staff_id = $_GET['staff_id'];
								$getSingleDataQry = "SELECT * FROM our_staff WHERE id={$staff_id}";
								$getResult = mysqli_query($dbCon, $getSingleDataQry);
							?>
							<form class="form-horizontal" action="../controller/StaffController.php" method="post" enctype="multipart/form-data">
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
										foreach ($getResult as $key => $staff) {
									?>
										<input type="hidden" class="form-control" name="staff_id" value="<?php echo $staff['id']; ?>">

										<div class="form-group">
											<label class="control-label col-lg-2" for="name">Name</label>
											<div class="col-lg-10">
												<input type="text" class="form-control" id="name" name="name" required value="<?php echo $staff['staff_name']; ?>">
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
															?>
															<option value="<?php echo $designation['id'];?>" <?php echo ($designation['id']==$staff['designation_id'])?'selected="selected"':'';?>><?php echo $designation['designation_name'];?></option>
												 		<?php
														}
													} 
												?>
				                            </select>
										</div>
									</div>
									<div class="form-group">
											<label class="control-label col-lg-2" for="staff_image">Image</label>
											<div class="col-lg-10">
												<input type="hidden" class="form-control" id="oldImage" name="oldImage" value="<?php echo $staff['staff_image']; ?>">
												<input type="file" class="form-control" id="staff_image" name="staff_image">
											</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2" for="twitter">Twitter</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="twitter" name="twitter" required value="<?php echo $staff['twitter']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2" for="facebook">Facebook</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="facebook" name="facebook" required value="<?php echo $staff['facebook']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2" for="linkedin">Linkedin</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="linkedin" name="linkedin" required value="<?php echo $staff['linkedin']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2" for="instagram">Instagram</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="instagram" name="instagram" required value="<?php echo $staff['instagram']; ?>">
										</div>
									</div>
													
									<?php } ?>
								</fieldset>

								<div class="text-right">
									<button type="submit" class="btn btn-primary" name="updateStaff">Submit</button>
									<a href="staffList.php" class="btn btn-default">Back To List </a>
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
