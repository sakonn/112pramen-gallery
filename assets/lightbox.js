(function($){
	var photos=$('.img-container').find('img').clone();
	console.log(photos);

	$('.img-container').on('click', function(event) {
		event.preventDefault();
		console.log('click event');
		var thisPhoto = $(this).find('img');
		//set query string with photo index
		let searchParams = new URLSearchParams(window.location.search)
		let url = new URL(window.location.href);
		if (!searchParams.has('photo')) {
			url.searchParams.append('photo',thisPhoto.attr('data-id'));
			lightboxOpen(thisPhoto.attr('data-photo_id'),thisPhoto.attr('data-id'));
			window.history.pushState(null,null,url);
		}else{
			//doesn't working yet
			url.searchParams.set('photo',thisPhoto.attr('data-id'));
			window.history.pushState(null,null,url);
			lightboxOpen(thisPhoto.attr('data-photo_id'),searchParams.get('photo'));
		}

		
	});
	$(document).on('keyup', function(event) {
		event.preventDefault();
		if(event.key=='Escape'){
			lightboxClose();
		}
	});


	function lightboxClose(){
		console.log('lightbox close');
		$('#lightbox').fadeOut('100').delay(100);
		let searchParams = new URLSearchParams(window.location.search);
		let url = new URL(window.location.href);
		url.searchParams.delete('photo');
		window.history.pushState(null,null,url);
	};

	function lightboxOpen(photo_id,photo_count){
		//only working with photo_count
		console.log('lightbox open');
		$('#lightbox').find('img').replaceWith(photos[photo_count]);
		$('#lightbox').fadeIn('100');
		console.log('index: '+photo_count);
	};

})(jQuery);