<?php 
class Demo{
	public static function createPhotos($farm_id,$server_id,$photo_id,$secret,$size){
		$img = 'https://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret.'_'.$size.'.jpg';
		return $img;
	}
}
?>