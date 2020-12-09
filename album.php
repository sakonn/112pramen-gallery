<?php
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
Debugger::fireLog('funguje to');
	$photos = json_decode(file_get_contents( 'https://www.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key='.$api_key.'&photoset_id='.$_REQUEST['id'].'&user_id=147245078%40N03&format=json&nojsoncallback=1'));
	foreach ($photos->photoset->photo as $photo) {
		$farm_id=$photo->farm;
		$server_id=$photo->server;
		$photo_id=$photo->id;
		$secret=$photo->secret;
		$size='q';
	
		echo '<a class="img-container" title="'.$photo->id.'" href="?id='.$photo->id.'">
				<img src="'.Photos::createPhotos($farm_id,$server_id,$photo_id,$secret,$size).'">
			</a>';
			
	}
  Debugger::barDump($photos->photoset->photo,'photos');
?>

</div>