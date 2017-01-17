
$( document ).ready(function() {
 
	search();

});

function search(){

	$('.search').on('input',function(e){
    	
    	var search = $('.search').val().toLowerCase();

    	$('.searchIn tr').each( function() {

    		var teamName = $(this).find(".name").text().toLowerCase();

    		if((teamName.indexOf(search) < 0))
    			$(this).hide();
    		else
    			$(this).show();

    	});

    });

}//searchTeam