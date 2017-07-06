<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <title>Ziber - Installer</title>
    <!-- meta tags ends; -->

    <!-- stylesheets -->
    <link rel="stylesheet" href="<?=media('vendors/bootstrap-3.3.7/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=media('vendors/bootstrap-3.3.7/css/bootstrap-theme.css')?>">
	<link rel="stylesheet" href="<?=media('css/main.css')?>">
    <!-- stylesheets ends; -->

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ziber-navbar-collapse" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=get_url('')?>">Ziber Installer</a>
    </div>
  </div><!-- /.container-fluid -->
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Step №1 <small>Configuration</small></h1>
		</div>
		<form action="<?=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>" method="POST" class="col-md-4 form">
			<p>Fill in the fields below:</p>
			<span>Ziber Node host address</span>
			<input name="sitehost" type="text" class="form-control" value="<?=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>" required>
			<span>Blockcypher API Token</span>
			<input name="blockcypher_token" type="text" class="form-control" required>
			<p>Database Configuration</p>
			<span>Hostname</span>
			<input name="db_host" type="text" class="form-control" value="localhost" required>
			<span>User</span>
			<input name="db_user" type="text" class="form-control" value="root" required>
			<span>Password</span>
			<input name="db_pass" type="text" class="form-control" required>
			<span>Database Name</span>
			<input name="db_name" type="text" class="form-control" value="ziber" required>
			<p><button type="submit" class="btn btn-success btn">Continue</button></p>
		</form>
	</div>
</div>
<!-- scripts -->
<script src="<?=media('vendors/jquery/jquery.min.js')?>"></script>
<script src="<?=media('vendors/bootstrap-3.3.7/js/bootstrap.min.js')?>"></script>
<!-- scripts ends; -->
</body>
</html>