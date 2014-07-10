<!doctype html>
<html lang="pl" ng-app="btApp">
<head>
    <meta charset="UTF-8">
    <title>BT admin</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,700&subset=latin-ext,latin' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css')?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/font-awesome.css')?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/pnotify.custom.min.css')?>" type="text/css">
    <link rel="stylesheet/less" href="<?php echo asset('css/general.less')?>" type="text/css">

    <script src="<?php echo asset('js/vendor/less.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/vendor/jquery.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/vendor/bootstrap.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/ajax.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/custom.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/pnotify.custom.js')?>" type="text/javascript"></script>

    <script src="<?php echo asset('js/vendor/angular.min.js'); ?>"></script>
    <script src="<?php echo asset('js/vendor/angular-route.min.js'); ?>"></script>
    <script src="<?php echo asset('js/vendor/angular-resource.min.js'); ?>"></script>
    <script src="<?php echo asset('js/vendor/angular-animate.min.js'); ?>"></script>
    <script src="<?php echo asset('js/vendor/ui-bootstrap.js'); ?>"></script>

    <script src="<?php echo asset('js/ng-controllers.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/ng-app.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/ng-services.js')?>" type="text/javascript"></script>
</head>
<body>
<div class="content container">
    @yield('mastercontent')
</div>
</body>
</html>