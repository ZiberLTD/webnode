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
    <link rel="stylesheet" href="<?=media('vendors/w2ui/w2ui-1.5.rc1.min.css')?>">
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
      <a class="navbar-brand" href="<?=get_url('statistics')?>">Ziber</a>
    </div>
	
    <div class="collapse navbar-collapse" id="ziber-navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="<?=get_url('statistics')?>">Statistics</a></li>
		<li><a href="<?=get_url('lookup_tasks')?>">Custom ZBR Contract Statistics</a></li>
		<li><a href="<?=get_url('add_chain')?>">Add new wallet</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" onclick="getInfoMessage('Currently, the settings are not available.')">Settings</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?=get_url('logout')?>">Exit</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</div>

<?php require_once($template.'.php'); ?>

<!-- modals -->
<div class="modal fade" tabindex="-1" role="dialog" id="infoMessage">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Message</h4>
			</div>
			<div class="modal-body">
				<div data-content="message">Demo Test</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">ОК</button>
			</div>
		</div>
	</div>
</div>

<!-- scripts -->
<script src="<?=media('vendors/jquery/jquery.min.js')?>"></script>
<script src="<?=media('vendors/bootstrap-3.3.7/js/bootstrap.min.js')?>"></script>
<script src="<?=media('vendors/w2ui/w2ui-1.5.rc1.min.js')?>"></script>
<script>
w2utils.locale('<?=media('vendors/w2ui/ru-ru.json')?>');
var API_statistics_table = '<?=get_url('statistics_table')?>';
var API_update_contract = '<?=get_url('updatecontract')?>';
</script>
<script src="<?=media('js/main.js')?>"></script>
<!-- scripts ends; -->
</body>
</html>