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
			<h1>Step №3 <small>Administrator account</small></h1>
		</div>
		<form action="<?=get_url('')?>" method="POST" class="col-md-4 form">
			<p>Fill in the fields below:</p>
			<span>Admin Login</span>
			<input name="username" type="text" class="form-control" required>
			<span>Password</span>
			<input name="password" type="text" class="form-control" required>
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