var win = $(window);

// for dekstop
if(win.width() > 960){
var initNavbar = 250;
    win.scroll(function () {
        if (win.scrollTop() >= initNavbar) {
            $( "#navigasi" ).addClass( "in-scroll" );
        }
        else if (win.scrollTop() <= initNavbar) {
            $( "#navigasi" ).removeClass( "in-scroll" );
        }
    });
}
// end for dekstop

// for mobile
if(win.width() < 512){
	$('#navigasi #content .wrapper #logo.bar #burger').click(function(){
		$('#navigasi').toggleClass("aktif");;
	});
}
// for mobile
