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
	foreach ($api->getAlbumPhotos($_REQUEST['id']) as $photo) {
		echo '<a class="img-container" title="'.$api->getPhotoID($photo).'" href="?id='.$api->getPhotoID($photo).'">
				<img src="'.$api->getPhotoThumbnailURL($photo).'">
			</a>';
	}
?>

</div>