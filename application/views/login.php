<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css'); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
	  <?php if ($success): ?>
	  <div class="alert alert-success">Register berhasil</div>
	  <?php endif;?>
	  <div id="status" class="alert alert-success d-none"></div>
      <form action="<?= site_url('login'); ?>" method="post">
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email" value='me@dihak.my.id'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password" value='123'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3">
	  <a href="<?= site_url('register'); ?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('dist/js/adminlte.min.js'); ?>"></script>

<script>
var form_element = $('form');
var status_element = $('#status');
form_element.on('submit', function(event) {
	event.preventDefault();
	status_element.text('Sedang login...').removeClass('d-none alert-success alert-danger').addClass('alert-info');
	$.ajax({
		type: 'POST',
		url: '<?= site_url('api/login'); ?>',
		data: form_element.serialize(),
		success: function(data) {
			var result = JSON.parse(data);
			if (result.success) {
				status_element.text('Login berhasil, mengalihkan...').removeClass('d-none alert-info alert-danger').addClass('alert-success');
				window.location.href = '<?= site_url('users'); ?>';
			} else {
				status_element.text('Login gagal').removeClass('d-none alert-info alert-success').addClass('alert-danger');
			}
		}
	})
})
</script>

</body>
</html>
