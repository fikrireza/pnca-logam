$("#header #sliders").owlCarousel({
	navigation : false,
	items: 1,
	singleItem:true,
	pagination:false,
	autoPlay: 3000,
    stopOnHover:false
});
$("#servis #sliders").owlCarousel({
	navigation : true,
	items: 1,
	singleItem:true,
	pagination:false,
	autoPlay: false,
    navigationText : ["<img src='amadeo/images-base/panah.png'>","<img src='amadeo/images-base/panah.png'>"]
});
$("#klien #sliders").owlCarousel({
	navigation : false,
	items: 4,
	singleItem:false,
	pagination:false,
	autoPlay: 3000,
    stopOnHover:false
});