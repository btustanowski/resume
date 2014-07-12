<!doctype html>
<html lang="en" ng-app="btApp">
<head>
    <meta charset="UTF-8">
    <title>Blaze Tustanowski</title>
    <link href='http://fonts.googleapis.com/css?family=Oswald|Droid+Sans|Lato|Roboto:100,300,400,700&subset=latin-ext,latin' rel='stylesheet' type='text/css'>
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


</head>
<body>
    <div class="content container">
        @yield('mastercontent')
    </div>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.1/styles/default.min.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.1/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</body>
</html>