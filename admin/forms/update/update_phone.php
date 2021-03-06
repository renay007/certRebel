<?php
require_once('/var/www/certrebel/classes/attendees/Attendees.php');
require_once('/var/www/certrebel/functions.php');
include_once('/var/www/certrebel/version_number.inc');

if (empty($_POST['attendee_id'])
		|| empty($_POST['attendee_phone'])) { 
	  $return['status']  = 'error';	
		die(json_encode($return));
} else {
	$info['attendee_id']		= htmlentities($_POST['attendee_id']);
	$info['attendee_phone']	= htmlentities($_POST['attendee_phone']);

	$attendee  = new Attendees\Attendee($info['attendee_id']);
	$attendee->updatePhone($info);
 	$return['status']  = 'success';	
	echo json_encode($return);
}
?>
