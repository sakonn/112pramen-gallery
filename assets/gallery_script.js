$(".galleryBackground").hover(function() {
  var button = $(this).children().children().last();
  button.animate({height: "40px"}, 150);
},function() {
  var button = $(this).children().children().last();
  if ($( window ).width() > 768){
   button.animate({height: "0px"}, 150);	
  }					
});

// Share gallery from the gallerieS view (using sharebutton)
$(document).on('click', '.customShare', function(e){
  e.preventDefault();
  if (!e) var e = window.event;
  e.cancelBubble = true;
  if (e.stopPropagation) e.stopPropagation();
  var shareLink = $(this).attr('data-album-url');
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val(shareLink).select();
  document.execCommand("copy");
  $temp.remove();
  $(".dialog").dialog({
    height: 70,
    open : function(eve, ui) {
      var item = $(this);
      window.setTimeout(function() {
        item.dialog('close');
        },
      1000);
    }
  });
});


$(function() {
  $("#customAlbum").justifiedGallery({
    rowHeight : 220,
    maxRowHeight: '200%',
    margins : 3,
    lastRow: 'center',
    cssAnimation: true,
    waitThumbnailsLoad: false,
  }).on('jg.complete', function (e) {
    lightGallery(document.getElementById('customAlbum'), {
      plugins: [lgZoom, lgAutoplay, lgFullscreen, lgHash, lgRotate, lgShare],
      speed: 500,
      pinterest: false,
      flipHorizontal: false,
      flipVertical: false,
      customSlideName: true,
    });
  });
});