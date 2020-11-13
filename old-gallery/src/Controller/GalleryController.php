<?php

namespace Drupal\gallery\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
* 
*/
class GalleryController extends ControllerBase{
	
	public function gallery() {
		$respose = [
			'#theme' => 'gallery_page',
			'#attached' => [
				'library' => [
					'gallery/gallery-style',
				]
			]
		];
		return $respose;
	}
}