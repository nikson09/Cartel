<?php require('_drawrating.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Multiple Ajax Star Rating Bars</title>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script type="text/javascript" language="javascript" src="/Templates/js/behavior.js"></script>
<script type="text/javascript" language="javascript" src="/Templates/js/rating.js"></script>
<link rel="stylesheet" type="text/css" href="/ratings/css/default.css" />
<link rel="stylesheet" type="text/css" href="/ratings/css/rating.css" />
<style>p.fot{margin:40px 0 20px;text-align:center;}</style>
</head>

<body>
<div id="container">
<h1>Unobtrusive AJAX Star Rating Bar</h1>

<h2>v 1.2.2, March 18</h2>
<br />
	
<?php echo rating_bar('4101',''); ?>
<?php echo rating_bar('i2001',''); ?>
<?php echo rating_bar('i11010',5); ?>

<?php echo rating_bar('i1',''); ?>
<?php echo rating_bar('2d',5); ?>
<?php echo rating_bar('3x',6); ?>
<?php echo rating_bar('4est',8); ?>
<?php echo rating_bar('550101'); ?>
<?php echo rating_bar('6634101','','static'); ?>
<?php echo rating_bar('66453410',''); ?>
<?php echo rating_bar('4',''); ?>

<br /><br />
</div>

<p class="fot">Скрипт скачан с сайта: <a href="https://age-dragon.com/scripts/45-reiting.html" target="_blank">Age-dragon.com</a></p>
</body>
</html>