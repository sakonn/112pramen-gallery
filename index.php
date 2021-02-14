<?php  
//tracy-developer tool
require __DIR__ . '/vendor/autoload.php';
include 'config.php';
include 'helpers.php';
include 'classes/FlickrAPI.php';

$api = new FlickrAPI($config['flickr']['key'], $config['flickr']['user'], $config['general']['albumsListing']);

use Tracy\Debugger;
Debugger::enable(Debugger::DEVELOPMENT);
Debugger::$maxLength = 250;
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
	<link type="text/css" rel="stylesheet" href="assets/lightgallery/css/lightgallery.css" /> 
</head>
<body>

<?php
//Debugger::barDump(getBaseURL());

if (array_key_exists('id', $_REQUEST)) {
	include 'album.php';
} else {
	include 'albums.php';
}

?>

	<script type="text/javascript" src="assets/jquery.min.js"></script>
	<script type="text/javascript" src="assets/jquery-ui.min.js"></script>
	<script type="text/javascript" src="assets/lightgallery/js/lightgallery.js"></script>

	<!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="assets/gallery_script.js"></script>
</body>

</html>
