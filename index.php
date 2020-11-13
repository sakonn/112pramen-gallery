<?php  
//tracy-developer tool
require __DIR__ . '/vendor/autoload.php';

use Tracy\Debugger;
Debugger::enable(Debugger::DEVELOPMENT);
?>

<!DOCTYPE html>
<html>
<head>
	<title>web</title>
	<script type="text/javascript" src="jquery-3.5.1.js"></script>
	<link rel="stylesheet" type="text/css" href="gallery_style.css">
</head>
<body>
	<div>
<a href="/">Home</a></div>
<?php 
include 'demo.php';

$api_key='4ae001246d441920120d36bf2086a92d';	
$x = json_decode(file_get_contents('https://www.flickr.com/services/rest/?method=flickr.photosets.getList&api_key='.$api_key.'&user_id=147245078%40N03&format=json&nojsoncallback=1'));

Debugger::barDump($_REQUEST,'req');
Debugger::barDump($x->photosets->photoset[0],'object');

if ($_REQUEST != null) {
	Debugger::fireLog('funguje to');
	$photos = json_decode(file_get_contents( 'https://www.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key='.$api_key.'&photoset_id='.$_REQUEST['id'].'&user_id=147245078%40N03&format=json&nojsoncallback=1'));
	foreach ($photos->photoset->photo as $photo) {
		$farm_id=$photo->farm;
		$server_id=$photo->server;
		$photo_id=$photo->id;
		$secret=$photo->secret;
		$size='q';
	
		echo '<a class="img-container" title="'.$photo->id.'" href="?id='.$photo->id.'">
				<img src="'.Demo::createPhotos($farm_id,$server_id,$photo_id,$secret,$size).'">
			</a>';
	}
	Debugger::barDump($photos->photoset->photo,'photos');
}else{

	foreach ($x->photosets->photoset as $photoset) {
		$farm_id=$photoset->farm;
		$server_id=$photoset->server;
		$photo_id=$photoset->primary;
		$secret=$photoset->secret;
		$size='q';
	
		echo '<a class="img-container" title="'.$photoset->id.'" href="?id='.$photoset->id.'">
				<img src="'.Demo::createPhotos($farm_id,$server_id,$photo_id,$secret,$size).'">
				<span>'.$photoset->title->_content.'</span>
			</a>';
	}
}

/*
foreach ($photosets->photoset as $value) {
	$photoset_id = 	$value->id;
	
	Debugger::barDump($photoset_id,'photoset');

	$url='https://www.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key='.$api_key.'&photoset_id='.$photoset_id.'&user_id=147245078%40N03&format=json&nojsoncallback=1';
	$data = json_decode(file_get_contents($url));

	for ($i=0; $i < 2; $i++) { 
		$farm_id=$data->photoset->photo[$i]->farm;
		$server_id=$data->photoset->photo[$i]->server;
		$photo_id=$data->photoset->photo[$i]->id;
		$secret=$data->photoset->photo[$i]->secret;
		$size='m';
		$img = 'https://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret.'_'.$size.'.jpg';
		echo '<img src="'.$img.'">';
	}
break;
}
*/
 

//api key 			4ae001246d441920120d36bf2086a92d
//secret api key 	d663ff1650c4ea2b 
//userid 			147245078@N03
?>



</body>
</html>
