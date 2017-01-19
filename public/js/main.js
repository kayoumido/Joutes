$( document ).ready(function() {
    	
    // Create custom delete alert when we click on a .button-delete
	$('.button-delete').click(function(){

		event.preventDefault(); // cancel the event click, needed to delte participant in team. Without the form is sumbit on icon click

		var type = $(this).data("type");
		var name = $(this).data("name");
		var title = '';
		var text = '';
		var form = $(this).parent();

		switch(type) {
		    case "sport":
		    	title = "Voulez-vous vraiment supprimer le sport \""+name+"\" ?";
		        text = "La suppression de ce sport va entrainer la suppression des courts liés"
		        break;
          	case "teamMember":
		    	title = "Voulez-vous vraiment supprimer le membre \""+name+"\" ?";
		        break;
		}

		alertDeleteSport(form, title, text);
  	});

  	function alertDeleteSport(form, title, text){
  		swal({
		  	title: title,
		  	text: text,
		  	type: "warning",
		  	showCancelButton: true,
		  	cancelButtonText: "Annuler",
	  		confirmButtonColor: "#DD6B55",
		  	confirmButtonText: "Oui, supprimer",
		  	closeOnConfirm: false
		},
		function(){
			$(form).submit();
		});
  	}

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
   

});