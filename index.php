<?php
    session_start();
    error_reporting (0);
    date_default_timezone_set('Europe/Chisinau');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Makovkin Alexandr | Autumn Drupal School 2014</title>
    <meta name="description" content="This is test site from Makovkin Alexandr">
    <meta name="keywords" content="drupal, html, css, jquery, php, mysql, git">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel='shortcut icon' href='favicon.ico'>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap-progressbar-3.3.0.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    
    <script src="assets/js/modernizr-2.6.2.min.js"></script>
</head>
<body>

<header>
    <div class="container">
            <?php include_once("/assets/includes/menu.php");?>
        <div class="clear"></div>
    </div>
    <div class="bottom-gradient"></div>
</header>

<!--IF JS DISABLED-->
<noscript>
    <?php include_once("/assets/includes/noscript.php");?>
</noscript>

<!-- ABOUT ME-->
<div id="light">
    <div class="container" id="aboutme_nojs" class="ifjsenabled">
        <?php include_once("/assets/includes/aboutme.php");?>
    </div>
</div>

<!-- SKILLS-->
<div id="dark">
    <div class="container" id="skills" class="skills">
        <?php include_once("/assets/includes/skills.php");?>
    </div>
</div>

<!--EXPERIENCE-->
<div id="light">
    <div class="container" id="experience">
        <?php include_once("/assets/includes/experience.php");?>
    </div>
</div>

<!-- CONTACT ME-->
<div id="dark">
    <div class="container" id="contactme">
        <?php include_once("/assets/includes/contactdata.php");?>
        <?php include("/assets/includes/contactform.php");?>
    </div>
</div>

<!-- FOOTER-->
<footer>
    <div class="container" id="footmenu">
        <div id="copy" class="alignleft">
            Copyright &copy; <?=date('Y');?> <a href="http://<?=$_SERVER['HTTP_HOST'];?>" title="">makwebber.com</a><br />All rights reserved.
        </div>
        <div id="contactfoot" class="alignright">
            <i class="fa fa-phone"></i> <a href="tel:+37378101060" class="phonelink" title="Phone Number">+37378101060</a>
            <br />
            <i class="fa fa-envelope"></i>
            <script type="text/javascript">
                emailE = ('mail@' + 'makwebber.com')
                document.write('<a href="mailto:' + emailE + '" class="mailtolink" title="Contact email">' + emailE + '</a>')
            </script>
        </div>
        <div class="clear"></div>
    </div>
</footer>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery-1.10.2.min.js"><\/script>')</script>
<script src="assets/js/bootstrap-progressbar.min.js"></script>
<script src="assets/js/jquery.singlePageNav.min.js"></script>
<script src="assets/js/google-maps-api.js"></script>
<script src="assets/js/googlemaps-conf.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>