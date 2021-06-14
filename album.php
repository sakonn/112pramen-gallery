<?php
require __DIR__ . '/vendor/autoload.php';

use Tracy\Debugger;
Debugger::enable(Debugger::DEVELOPMENT);
?>
<div class="buttons">
<?php
	//Debugger::barDump();
	$siblings = $api->getAlbumSiblings($_REQUEST['id']);
	if ($siblings[0] != null) {
		echo '<div class="previousGallery" style="" title="'.$api->getAlbumTitle($siblings[0]).'"><a href="'.$api->getAlbumURL($siblings[0]).'"><div class="galleryPreviousButton"></div></a></div>';
	}
	echo '<a class="galleryButton" href="/">Späť na albumy</a>';
	if ($siblings[1] != null) {
		echo '<div class="nextGallery" style="" title="'.$api->getAlbumTitle($siblings[1]).'"><a href="'.$api->getAlbumURL($siblings[1]).'"><div class="galleryNextButton"></div></a></div>';
	}
?>
</div>
<div class="album-header">
	<div>
		<h1 class="album-header-title"></h1>
		<p class="album-header-description"></p>
		<a href="#" class="album-share" title="Zdieľať galériu"></a>
	</div>
</div>

<div id="customAlbum" class="justified-gallery">
<?php
	foreach ($api->getAlbumPhotos($_REQUEST['id'], array_key_exists('page', $_REQUEST) ? $_REQUEST['page'] : null) as $photo) {
		echo '<a class="" id="'.$api->getPhotoID($photo).'" href="'.$api->getPhotoLargeURL($photo).'">
				<img src="'.$api->getPhotoThumbnailURL($photo).'">
			</a>';
	}
?>

</div>

<?php

if ($api->getAlbumPaginationRequired()) {
	echo '<div id="pagination" class="text-center">';
	
	$page = array_key_exists('page', $_REQUEST) ? $_REQUEST['page'] : 1;
	foreach ($api->getAlubmPagination() as $key=>$item) {
		$active = ($page == $key) ? ' active' : '';
		echo '
		<a href="'.$item['url'].'">
			<button page="'.$key.'" class="paginationButton'.$active.'">'.$key.'</button>
		</a>';
	}

	echo '</div>';
}
?>