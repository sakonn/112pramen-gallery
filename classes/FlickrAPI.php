<?php 
use Tracy\Debugger;

class FlickrAPI{
	private $key;
  private $user;

  public function __construct($apikey, $user){
    $this->key = $apikey;
    $this->user = $user;
  }

  public function geAlbumsList(){
    $x = json_decode(file_get_contents('https://www.flickr.com/services/rest/?method=flickr.photosets.getList&api_key='.$this->key.'&user_id='.$this->user.'&format=json&nojsoncallback=1'));

    return $x->photosets->photoset;
  }

  public function getAlbumURL($album) {

  }

  public function getAlbumID($album) {
    return $album->id;
  }

  public function getAlbumCoverImageURL($album) {
		$size='w';
    $img = 'https://farm'.$album->farm.'.staticflickr.com/'.$album->server.'/'.$album->primary.'_'.$album->secret.'_'.$size.'.jpg';

		return $img;
  }

  public function getAlbumTitle($album) {
    return $album->title->_content;
  }

  public function getAlbumPhotoCount($album) {
    return $album->count_photos;
  }

  public function getAlbumPhotos($albumId) {
    $photos = json_decode(file_get_contents('https://www.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key='.$this->key.'&photoset_id='.$albumId.'&user_id='.$this->user.'&format=json&nojsoncallback=1'));
    return $photos->photoset->photo;
  }

  public function getPhotoURL($photo) {
		$size='q';
    $img = 'https://farm'.$photo->farm.'.staticflickr.com/'.$photo->server.'/'.$photo->id.'_'.$photo->secret.'_'.$size.'.jpg';
    
		return $img;
  }

  public function getPhotoID($photo) {
    return $photo->id;
  }
}
?>