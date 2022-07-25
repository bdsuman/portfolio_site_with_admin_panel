<!DOCTYPE html>
<html lang="en">
	
<?php

	// die($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
	if (basename(__DIR__) != 'admin') {
		$baseUrl = '../';
		$isInternal = true;
	} else {
		$baseUrl = '';
		$isInternal = false;
	}
 	include '../includes/head.php'; 
 	require '../controller/dbConfig.php'; 
	
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
							<li><a href="#"><i class="icon-magazine position-left"></i> Designation</a></li>
							<li class="active">List</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Designation List</h5>
							<div class="heading-elements">
								<ul class="icons-list">
									<li><a href="designationCreate.php" class="btn btn-primary add-new">Add New</a></li>
			                		<!-- <li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li> -->
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<?php
								if (isset($_GET['msg'])) {
							?>
								<div class="alert alert-success no-border mt-10">
									<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
									<span class="text-semibold">Success</span> <?php echo $_GET['msg']; ?>
								</div>
							<?php } ?>

							<table class="table table-bordered datatable-basic">
								<thead>
									<tr>
										<th width="10%">SL.</th>
										<th width="80%">Designation Name</th>
										<th width="10%" class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody>

								<?php 
									$selectQry = "SELECT * FROM designations WHERE active_status=1";
									$designationList = mysqli_query($dbCon, $selectQry);
									
									foreach ($designationList as $key => $designation) {
								?>
									<tr>
										<td><?php echo ++$key; ?></td>
										<td><?php echo $designation['designation_name']; ?></td>
										<td class="text-center">
											<a href="designationUpdate.php?designation_id=<?php echo $designation['id']; ?>"><i class="icon-pencil7"></i></a>
											<a href="designationDelete.php?designation_id=<?php echo $designation['id']; ?>"><i class="icon-trash"></i></a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
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
