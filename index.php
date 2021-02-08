<?php  
//tracy-developer tool
require __DIR__ . '/vendor/autoload.php';
include 'config.php';
include 'helpers.php';
include 'classes/FlickrAPI.php';

$api = new FlickrAPI($config['flickr']['key'], $config['flickr']['user']);

use Tracy\Debugger;
Debugger::enable(Debugger::DEVELOPMENT);
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>112 pramen Flickr gallery</title>
	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="assets/gallery_style.css">
	<link rel="stylesheet" type="text/css" href="assets/albums.css">
	<link rel="stylesheet" type="text/css" href="assets/album.css">
</head>
<body>

<?php
//$api_key='4ae001246d441920120d36bf2086a92d';
//$x = json_decode(file_get_contents('https://www.flickr.com/services/rest/?method=flickr.photosets.getList&api_key='.$api_key.'&user_id=147245078%40N03&format=json&nojsoncallback=1'));

//Debugger::barDump(getBaseURL());

if (array_key_exists('id', $_REQUEST)) {
	include 'album.php';
} else {
	include 'albums.php';
}

//api key 			4ae001246d441920120d36bf2086a92d
//secret api key 	d663ff1650c4ea2b
//userid 			147245078@N03
?>

	<script type="text/javascript" src="assets/jquery.min.js"></script>
	<script type="text/javascript" src="assets/jquery-ui.min.js"></script>
	<script src="assets/gallery_script.js" type="text/javascript"></script>
</body>
</html>
