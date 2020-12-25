<?php
//tracy - debbuging tool
require __DIR__ . '/vendor/autoload.php';

use Tracy\Debugger;
Debugger::enable(Debugger::DEVELOPMENT);
?>
<div class="buttons">
	<div class="previousGallery" style="display: none;" title="Novšia galéria"><a href=""><div class="galleryPreviousButton"></div></a></div>
	<a class="galleryButton" href="/">Späť na albumy</a>
	<div class="nextGallery" style="display: none;" title="Staršia galéria"><a href=""><div class="galleryNextButton"></div></a></div>
</div>
<div class="album-header">
	<div>
		<h1 class="album-header-title"></h1>
		<p class="album-header-description"></p>
		<a href="#" class="album-share" title="Zdieľať galériu"></a>
	</div>
</div>

<div id="customMyGallery">
<?php
	Debugger::fireLog('album start');
	//load all photos into array
	$photos = json_decode(file_get_contents( 'https://www.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key='.$api_key.'&photoset_id='.$_REQUEST['id'].'&user_id=147245078%40N03&format=json&nojsoncallback=1'));
	//$photos_count = position of photo in array
	$photo_count=0;
	$photosArray =  $photos->photoset->photo;
	$farm_id=$photosArray[0]->farm;
	$server_id=$photosArray[0]->server;
	$size='q';
	foreach ($photosArray as $photo) {
		$photo_id=$photo->id;
		$secret=$photo->secret;
		//create imgs
		echo '<a class="img-container" title="'.$photo->id.'" href="?id='.$photo->id.'">
				<img src="'.Photos::createPhotos($farm_id,$server_id,$photo_id,$secret,$size).'" data-id="'.$photo_count.'" data-photo_id="'.$photo_id.'">
			</a>';
			$photo_count++;	
	}
  Debugger::barDump($photos->photoset->photo,'photos');
?>
</div>
<div id="lightbox">
<?php
//light box (PHP not working yet)
	//$id = $_REQUEST['photo'];
	echo ' <img src=""> '
	///*.Photos::createPhotos($farm_id,$server_id,$photosArray[$id]->id,$photosArray[$id]->secret,$size).*/
?>
</div>