<?php  
//tracy-developer tool
require __DIR__ . '/tracy-2.7.5/src/tracy.php'; 
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
<a href="/">Home</a>
<?php 
$api_key='4ae001246d441920120d36bf2086a92d';	
$x = json_decode(file_get_contents('https://www.flickr.com/services/rest/?method=flickr.photosets.getList&api_key='.$api_key.'&user_id=147245078%40N03&format=json&nojsoncallback=1'));

Debugger::barDump($_REQUEST,'req');

if ($_REQUEST != null) {
	Debugger::fireLog('funguje to');
	foreach ($variable as $key => $value) {
		# code...
	}
}else{

	foreach ($x->photosets->photoset as $photoset) {
		$farm_id=$photoset->farm;
		$server_id=$photoset->server;
		$photo_id=$photoset->primary;
		$secret=$photoset->secret;
		$size='q';
		$img = 'https://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret.'_'.$size.'.jpg';

		echo '<a class="img-container" title="'.$photoset->id.'" href="?id='.$photoset->id.'">
				<img src="'.$img.'">
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
