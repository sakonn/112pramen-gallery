<?php 
use Tracy\Debugger;

class FlickrAPI{
	private $key;
  private $user;
  private $albumsListing;
  private $albumListing;
  private $albumsData;
  private $albumData;

  public function __construct($apikey, $user, $albumsListing, $albumListing){
    $this->key = $apikey;
    $this->user = $user;
    $this->albumsListing = $albumsListing;
    $this->albumListing = $albumListing;
  }

  public function getAlbumsList($page, $perPage = 0){
    $perPage = $perPage == 0 ? $this->albumsListing : $perPage;
    if ($page != null) {
      $this->albumsData = json_decode(file_get_contents('https://www.flickr.com/services/rest/?method=flickr.photosets.getList'.
      '&api_key='.$this->key.
      '&user_id='.$this->user.
      '&page='.$page.
      '&per_page='.$perPage.
      '&format=json&nojsoncallback=1'));
    } else {
      $this->albumsData = json_decode(file_get_contents('https://www.flickr.com/services/rest/?method=flickr.photosets.getList'.
      '&api_key='.$this->key.
      '&user_id='.$this->user.
      '&page=1'.
      '&per_page='.$perPage.
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

  public function getAlbumsPaginationRequired() {
    if ($this->albumsData->photosets->perpage < $this->albumsData->photosets->total) {
      return true;
    }
    return false;
  }

  public function getAlubmsPagination() {
    $pagination = [];
    
    for ($i=1; $i <= ceil($this->albumsData->photosets->total / $this->albumsData->photosets->perpage); $i++) { 
      $pagination[$i] = [
        'number' => $i,
        'url' => $this->getBaseURL() . '/?page=' . $i,
      ];
    }
    return $pagination;
  }

  public function getAlbumPhotos($albumId, $page) {
    if ($page != null) {
      $this->albumData = json_decode(file_get_contents('https://www.flickr.com/services/rest/?method=flickr.photosets.getPhotos'.
      '&api_key='.$this->key.
      '&photoset_id='.$albumId.
      '&user_id='.$this->user.
      '&per_page='.$this->albumListing.
      '&page='.$page.
      '&format=json&nojsoncallback=1'));
    } else {
      $this->albumData = json_decode(file_get_contents('https://www.flickr.com/services/rest/?method=flickr.photosets.getPhotos'.
      '&api_key='.$this->key.
      '&photoset_id='.$albumId.
      '&user_id='.$this->user.
      '&per_page='.$this->albumListing.
      '&page=1'.
      '&format=json&nojsoncallback=1'));
    }
    
    return $this->albumData->photoset->photo;
  }

  public function getAlbumSiblings($albumId) {
    if ($this->albumsData == null) {
      $this->getAlbumsList(null, 500);
    }

    $albumPosition = intval(key(array_filter($this->albumsData->photosets->photoset, function($album) use ($albumId) {
      return $album->id == $albumId;
    })));
    $previousAlbum = $albumPosition != 0 ? $this->albumsData->photosets->photoset[$albumPosition - 1] : null;
    $nextAlbum = $albumPosition < $this->albumsData->photosets->total ? $this->albumsData->photosets->photoset[$albumPosition + 1] : null;
    //Debugger::barDump(intval($albumPosition) < $this->albumsData->photosets->total);
    //Debugger::barDump($this->albumsData->photosets->photoset[$previousAlbum]);
    //Debugger::barDump($this->albumsData->photosets->photoset[$nextAlbum]);

    return [$previousAlbum, $nextAlbum];
  }
  
  public function getAlbumPaginationRequired() {

    if ($this->albumData->photoset->perpage < $this->albumData->photoset->total) {
      return true;
    }
    return false;
  }

  public function getAlubmPagination() {
    $pagination = [];
    
    for ($i=1; $i <= ceil($this->albumData->photoset->total / $this->albumData->photoset->perpage); $i++) { 
      $pagination[$i] = [
        'number' => $i,
        'url' => $this->getBaseURL() .'/?id='. $this->getAlbumID($this->albumData->photoset) . '&page=' . $i,
      ];
    }
    return $pagination;
  }

  public function getPhotoThumbnailURL($photo) {
		$size='w';
    $img = 'https://farm'.$photo->farm.'.staticflickr.com/'.$photo->server.'/'.$photo->id.'_'.$photo->secret.'_'.$size.'.jpg';

		return $img;
  }

  public function getPhotoLargeURL($photo) {
		$size='b';
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