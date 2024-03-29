<?php

header("Cache-Control: no-cache");
header("Pragma: nocache");
require('_config-rating.php');

//getting the values
$vote_sent = preg_replace("/[^0-9]/","",$_REQUEST['j']);
$id_sent = preg_replace("/[^0-9a-zA-Z]/","",$_REQUEST['q']);
$ip_num = preg_replace("/[^0-9\.]/","",$_REQUEST['t']);
$units = preg_replace("/[^0-9]/","",$_REQUEST['c']);
$ip = $_SERVER['REMOTE_ADDR'];

if ($vote_sent > $units) die("Sorry, vote appears to be invalid."); // kill the script because normal users will never see this.


//connecting to the database to get some information
$query = mysqli_query($rating_conn,"SELECT total_votes, total_value, used_ips FROM $rating_dbname.$rating_tableName WHERE id='$id_sent' ")or die(" Error: ".mysqli_error());
$numbers = mysqli_fetch_assoc($query);
$checkIP = unserialize($numbers['used_ips']);
$count = $numbers['total_votes']; //how many votes total
$current_rating = $numbers['total_value']; //total number of rating added together and stored
$sum = $vote_sent+$current_rating; // add together the current vote value and the total vote value
$tense = ($count==1) ? "vote" : "votes"; //plural form votes/vote

// checking to see if the first vote has been tallied
// or increment the current number of votes
($sum==0 ? $added=0 : $added=$count+1);

// if it is an array i.e. already has entries the push in another value
((is_array($checkIP)) ? array_push($checkIP,$ip_num) : $checkIP=array($ip_num));
$insertip=serialize($checkIP);

//IP check when voting
$voted=mysqli_num_rows(mysqli_query($rating_conn,"SELECT used_ips FROM $rating_dbname.$rating_tableName WHERE used_ips LIKE '%".$ip."%' AND id='".$id_sent."' "));
if(!$voted) {     //if the user hasn't yet voted, then vote normally...

	if (($vote_sent >= 1 && $vote_sent <= $units) && ($ip == $ip_num)) { // keep votes within range, make sure IP matches - no monkey business!
		$update = "UPDATE $rating_dbname.$rating_tableName SET total_votes='".$added."', total_value='".$sum."', used_ips='".$insertip."' WHERE id='$id_sent'";
		$result = mysqli_query($rating_conn,$update);		
	} 
} //end for the "if(!$voted)"
// these are new queries to get the new values!
$newtotals = mysqli_query($rating_conn,"SELECT total_votes, total_value, used_ips FROM $rating_dbname.$rating_tableName WHERE id='$id_sent' ")or die(" Error: ".mysqli_error());
$numbers = mysqli_fetch_assoc($newtotals);
$count = $numbers['total_votes'];//how many votes total
$current_rating = $numbers['total_value'];//total number of rating added together and stored
$tense = ($count==1) ? "голос" : "голоса"; //plural form votes/vote

// $new_back is what gets 'drawn' on your page after a successful 'AJAX/Javascript' vote

$new_back = array();

$new_back[] .= '<ul class="unit-rating" style="width:'.$units*$rating_unitwidth.'px;">';
$new_back[] .= '<li class="current-rating" style="width:'.@number_format($current_rating/$count,2)*$rating_unitwidth.'px;">Current rating.</li>';
$new_back[] .= '<li class="r1-unit">1</li>';
$new_back[] .= '<li class="r2-unit">2</li>';
$new_back[] .= '<li class="r3-unit">3</li>';
$new_back[] .= '<li class="r4-unit">4</li>';
$new_back[] .= '<li class="r5-unit">5</li>';
$new_back[] .= '<li class="r6-unit">6</li>';
$new_back[] .= '<li class="r7-unit">7</li>';
$new_back[] .= '<li class="r8-unit">8</li>';
$new_back[] .= '<li class="r9-unit">9</li>';
$new_back[] .= '<li class="r10-unit">10</li>';
$new_back[] .= '</ul>';
$new_back[] .= '<p class="voted">'.$id_sent.'. Рейтинг: <strong>'.@number_format($sum/$added,1).'</strong>/'.$units.' ('.$count.' '.$tense.' принят) ';
$new_back[] .= '<span class="thanks">Спасибо за голос!Ваш отзыв важен для нас!</span></p>';

$allnewback = join("\n", $new_back);

// ========================

//name of the div id to be updated | the html that needs to be changed
$output = "unit_long$id_sent|$allnewback";
echo $output;
?>