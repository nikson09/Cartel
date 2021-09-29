<?php

	//Connect to  your rating database
	$rating_dbhost        = 'localhost';
	$rating_dbuser        = 'nikson09';
	$rating_dbpass        = 'PpamWwt5s';
	$rating_dbname        = 'id11297748_king_drink_shop';
	$rating_tableName     = 'ratings';
	$rating_path_db       = ''; // the path to your db.php file (not used yet!)
	$rating_path_rpc      = ''; // the path to your rpc.php file (not used yet!)

	$rating_unitwidth     = 30; // the width (in pixels) of each rating unit (star, etc.)
	// if you changed your graphic to be 50 pixels wide, you should change the value above
	
$rating_conn = mysqli_connect($rating_dbhost, $rating_dbuser, $rating_dbpass) or die  ('Error connecting to mysql');
	//mysql_select_db($rating_dbname);

?>