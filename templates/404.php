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
<body class="not_found">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
                </div>
                <div class="error-actions">
                    <a href="<?=get_url('statistics')?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Take Me Home </a><a href="mailto:support@ziber.io" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
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