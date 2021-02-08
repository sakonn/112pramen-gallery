<?php
  //include 'classes.php';
	use Tracy\Debugger;
?>

<div class="dialog text-center" style="display:none;">
  Odkaz bol skopirovany do schranky.
</div>



<div id="customMyGallery" >

<?php
  foreach ($api->geAlbumsList() as $key=>$album) {
		
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