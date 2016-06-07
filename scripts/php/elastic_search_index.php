<?php
ob_start();
session_start();
require_once('/var/www/certrebel/functions.php');
require_once('/var/www/certrebel/libraries/composer/elastic_search.php');
date_default_timezone_set('America/New_york');

try {
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
	$checkUserQuery ="SELECT 
												*
										FROM
												CertRebel.courses
														LEFT JOIN
												course_details ON `courses`.course_id = `course_details`.course_id
										ORDER BY `course_details`.course_position";
	$checkUserStmt = $dbConnection->prepare($checkUserQuery);
	$checkUserStmt->execute();
	while ($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC)) {
		$params = [
			'index' => 'courses',
			'type'  => 'course',
			'id'    => $queryResult['course_id'],
			'body'  => [
				'title' => $queryResult['course_long_title'],
				'body' => $queryResult['course_short_detail'],
				'keywords' => explode(', ', $queryResult['course_keywords'])
			]
		];
		$response = $client->index($params);
	}
}
catch (PDOException $e) {
	die("Error: Cannot satisfy your request at this time. Please try again later");
}
ob_flush();

if ($response)
	print_r($response);

?>
