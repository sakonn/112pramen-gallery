<?php
  //include 'classes.php';
	use Tracy\Debugger;
?>

<div class="dialog text-center" style="display:none;">
  Odkaz bol skopirovany do schranky.
</div>

<div id="customMyGallery" >
	<?php
		foreach ($api->getAlbumsList(array_key_exists('page', $_REQUEST) ? $_REQUEST['page'] : null) as $key=>$album) {
			
			echo '
			<div class="customCover">
				<div class="customGal">
					<a class="customAlb" href="?id='.$api->getAlbumID($album).'">
						<div id="'.$api->getAlbumID($album).'" gallerynumber="'.$key.'" class="customImage" style="background-image: url(&quot;'.$api->getAlbumCoverImageURL($album).'&quot;);"></div>
					</a>
					<a class="customLink" href="?id='.$api->getAlbumID($album).'">
						'.$api->getAlbumTitle($album).'
					</a>
					<div class="customInfo">
						<span class="customSum">
						'.$api->getAlbumPhotoCount($album).' fotiek
						</span>
						<span class="customShare" data-album-url="'.$api->getAlbumURL($album).'">
							Zdieľať
						</span>
					</div>
				</div>
			</div>
			';
		}
	?>
</div>
<?php

if ($api->getAlbumsPaginationRequired()) {
	echo '<div id="pagination" class="text-center">';
	
	$page = array_key_exists('page', $_REQUEST) ? $_REQUEST['page'] : 1;
	foreach ($api->getAlubmsPagination() as $key=>$item) {
		$active = ($page == $key) ? ' active' : '';
		echo '
		<a href="'.$item['url'].'">
			<button page="'.$key.'" class="paginationButton'.$active.'">'.$key.'</button>
		</a>';
	}

	echo '</div>';
}
?>