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
	<style type="text/css">
		body{
			display: flex;
			flex-wrap: wrap;
			max-width: 80%;
			margin: auto;
			justify-content: center;
		}
		.img-container{
			margin: 1%;
			filter: grayscale(20%);
		}
		.img-container img{
			min-width: 15vw;
			height: 100%;
		}
		.img-container span{
			position: absolute;
		    width: 100%;
		    bottom: 0;
		    left: 0;
		    text-align: center;
		    font-weight: bold;
		    color: white;
		    background-color: rgba(0,0,0,0.6);
		}
	</style>
</head>
<body>

<?php
$api_key='4ae001246d441920120d36bf2086a92d';	
$x = json_decode(file_get_contents('https://www.flickr.com/services/rest/?method=flickr.photosets.getList&api_key='.$api_key.'&user_id=147245078%40N03&format=json&nojsoncallback=1'));


Debugger::barDump($x->photosets->photoset,'daco');

foreach ($x->photosets->photoset as $photoset) {
	$farm_id=$photoset->farm;
	$server_id=$photoset->server;
	$photo_id=$photoset->primary;
	$secret=$photoset->secret;
	$size='q';
	$img = 'https://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret.'_'.$size.'.jpg';
	echo '<div class="img-container">
			<img src="'.$img.'">
			<span>'.$photoset->title->_content.'</span>
		</div>';
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
