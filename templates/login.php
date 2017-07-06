<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <title>Ziber - Administration Panel</title>
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
      <a class="navbar-brand" href="#">Ziber</a>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</div>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<?php if(isset($data['error'])): ?>
			<div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <?=$data['error']?>
			</div>
			<?php endif; ?>
			<div class="panel panel-default">
				<div class="panel-heading text-center">Authorization</div>
				<div class="panel-body">
				<form action="<?=get_url('login')?>" method="post">
					<input name="login" type="text" class="form-control col-md-12" placeholder="Login" required>
					<input name="password" type="password" class="form-control col-md-12" style="margin-top: 5px;" placeholder="Password" required>
					<div class="col-md-12 text-center"  style="margin-top: 5px;">
						<button type="submit" class="btn btn-success">Log-in</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- scripts -->
<script src="<?=media('vendors/jquery/jquery.min.js')?>"></script>
<script src="<?=media('vendors/bootstrap-3.3.7/js/bootstrap.min.js')?>"></script>
<script src="<?=media('js/main.js')?>"></script>
<!-- scripts ends; -->
</body>
</html>