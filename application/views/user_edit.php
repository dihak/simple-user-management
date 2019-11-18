<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1>Edit User</h1>
		  </div>
		  <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="<?= site_url(); ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?= site_url('users'); ?>">Users</a></li>
			  <li class="breadcrumb-item active">Edit</li>
			</ol>
		  </div>
		</div>
	  </div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card card-primary">
				  <!-- form start -->
				  <form role="form" id="edit-user" enctype="multipart/form-data">
					<?= form_hidden('id', $user->id); ?>
					<div class="card-body">
					  <div class="form-group">
						<label for="nama">Full name</label>
						<?= form_input($input_nama); ?>
					  </div>
					  <div class="form-group">
						<label for="email">Email address</label>
						<?= form_input($input_email); ?>
					  </div>
					  <div class="form-group">
						<label for="password">Old password</label>
						<input type="password" class="form-control" name="passold" placeholder="Old password">
					  </div>
					  <div class="form-group">
						<label for="passnew">New password</label>
						<input type="password" class="form-control" name="passnew" placeholder="New password">
					  </div>
					  <div class="form-group">
						<label for="passconf">Retype password</label>
						<input type="password" class="form-control" name="passconf" placeholder="Retype password">
					  </div>
					  <div class="form-group">
						<label for="exampleInputFile">File input</label>
						<div class="input-group">
						  <div class="custom-file">
							<input name="photo" type="file" class="custom-file-input" id="photo">
							<label class="custom-file-label" for="photo">Choose file</label>
						  </div>
						  <div class="input-group-append">
							<span class="input-group-text" id="">Upload</span>
						  </div>
						</div>
					  </div>
					</div>
					<!-- /.card-body -->

					<div class="card-footer">
					  <a href="<?=site_url('users');?>" class="btn btn-secondary">Cancel</a>
					  <button type="submit" class="btn btn-primary">Submit</button>
					</div>
				  </form>
				</div>
			</div>
		</div>
		<!-- /.row -->
	  </div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
  </div>
