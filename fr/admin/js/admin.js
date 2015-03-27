$(document).ready(function(){
	
// EXTERNAL LINKS
	$('a[href^="http://"]').click(function(){ window.open( $(this).attr('href') ); return false; });

// MENU ACTIVE
	$('#nav a').each(function(i,o){
		if( $(location).attr('href').indexOf($(o).attr('href')) > 0 )
			$(o).parent().addClass('active').parent().parent().addClass('active');
	});

});