<?php 
use Tracy\Debugger;

class FlickrAPI{
	private $key;
  private $user;
  private $albumListing;
  private $albumsData;

  public function __construct($apikey, $user, $albumListing){
    $this->key = $apikey;
    $this->user = $user;
    $this->albumListing = $albumListing;
  }

  public function geAlbumsList(){
    if (array_key_exists('page', $_REQUEST)) {
      $this->albumsData = json_decode(file_get_contents('https://www.flickr.com/services/rest/?method=flickr.photosets.getList'.
      '&api_key='.$this->key.
      '&user_id='.$this->user.
      '&page='.$_REQUEST['page'].
      '&per_page='.$this->albumListing.
      '&format=json&nojsoncallback=1'));
    } else {
      $this->albumsData = json_decode(file_get_contents('https://www.flickr.com/services/rest/?method=flickr.photosets.getList'.
      '&api_key='.$this->key.
      '&user_id='.$this->user.
      '&page=1'.
      '&per_page='.$this->albumListing.
      '&format=json&nojsoncallback=1'));
    }
    
    return $this->albumsData->photosets->photoset;
  }

  public function getAlbumURL($album) {
    return $this->getBaseURL() . '/?id=' . $this->getAlbumID($album);
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
  public function getAlbumPaginationRequired() {
    if ($this->albumsData->photosets->perpage < $this->albumsData->photosets->total) {
      return true;
    }
    return false;
  }

  public function getAlubmPagination() {
    $pagination = [];
    
    for ($i=1; $i <= ceil($this->albumsData->photosets->total / $this->albumsData->photosets->perpage); $i++) { 
      $pagination[$i] = [
        'number' => $i,
        'url' => $this->getBaseURL() . '/?page=' . $i,
      ];
    }
    return $pagination;
  }

  public function getPhotoThumbnailURL($photo) {
		$size='q';
    $img = 'https://farm'.$photo->farm.'.staticflickr.com/'.$photo->server.'/'.$photo->id.'_'.$photo->secret.'_'.$size.'.jpg';

		return $img;
  }

  public function getPhotoID($photo) {
    return $photo->id;
  }

  private function getBaseURL() {
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") ."://{$_SERVER['HTTP_HOST']}";
  }
}
?>