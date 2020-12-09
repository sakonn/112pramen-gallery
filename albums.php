<?php
  //include 'classes.php';
?>

<div class="dialog text-center" style="display:none;">
  Odkaz bol skopirovany do schranky.
</div>



<div id="customMyGallery" >

<?php
  foreach ($x->photosets->photoset as $key=>$photoset) {
		//Debugger::barDump($photoset);
		$farm_id=$photoset->farm;
		$server_id=$photoset->server;
		$photo_id=$photoset->primary;
		$secret=$photoset->secret;
		$size='w';
	
		echo '
		<div class="customCover">
			<div class="customGal">
        <a class="customAlb" href="?id='.$photoset->id.'">
          <div id="'.$photoset->id.'" gallerynumber="'.$key.'" class="customImage" style="background-image: url(&quot;'.Photos::createPhotos($farm_id,$server_id,$photo_id,$secret,$size).'&quot;);"></div>
        </a>
        <a class="customLink" href="?id='.$photoset->id.'">
          '.$photoset->title->_content.'
        </a>
				<div class="customInfo">
					<span class="customSum">
					'.$photoset->count_photos.' fotiek
					</span>
					<span class="customShare">
						Zdieľať
					</span>
				</div>
			</div>
		</div>
		';
  }
  
  // <div id="72157716208936413" gallerynumber="0" class="album" style="background-image: url(&quot;https://farm5.staticflickr.com//65535//50404830328_14dafbaee0_n.jpg&quot;);"><div class="galleryBackground"><div class="galleryInfo"><div class="galleryDesc"><a>Otvorenie skautského roka 2020/21</a></div><button class="shareButton plain-button" title="Zdieľať galériu" style="height: 0px;"><a class="shareGallery"></a></button></div></div></div>
	
?>

</div>