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
		    	title = "Voulez-vous vraiment supprimer le sport \""+name+"\"?";
		        text = "La suppression de ce sport va entrainer la suppression des courts liés";
		        break;
	        case "court":
	        	title = "Voulez-vous vraiment supprimer le terrain \""+name+"\"?";
		        break;
          	case "teamMember":
		    	title = "Voulez-vous vraiment supprimer \""+name+"\" de cette équipe ?";
		        break;
		    case "memberTeam":
		    	title = "Voulez-vous vraiment retirer "+name+" ?";
		        break;
		}

		alertConfirm(form, title, text);
  	});

  	function alertConfirm(form, title, text){
  		swal({
		  	title: title,
		  	text: text,
		  	type: "warning",
		  	showCancelButton: true,
		  	cancelButtonText: "Annuler",
	  		confirmButtonColor: "#DD6B55",
		  	confirmButtonText: "Confirmer",
		  	closeOnConfirm: false
		},
		function(isConfirm){
			if(isConfirm){
				$(form).submit();
			}
			else{
				if ($(".addMember")[0]) //if class exit on this page
				$('.addMember').find("option")[0].selected = true;//display defaut select
			}
				
		});
  	}

  	$('.search').on('input',function(e){
    	
    	var search = $('.search').val().toLowerCase();

    	$('.searchIn tr').each( function() {

    		var teamName = $(this).find(".name").text().toLowerCase();

    		if(teamName.indexOf(search) < 0)
    			$(this).hide();
    		else
    			$(this).show();

    	});

    });
   
  	$( ".addMember" ).change(function() {

		var name = $(this).find("option:selected").text();
		var form = $(this).parent();
		if($(this).attr("name") == "team")
			var title = "Voulez-vous ajouter ce participant à l'équipe \""+name+"\" ?";
		else 
  			var title = "Voulez-vous ajouter \""+name+"\" à l'équipe ?";

	  	alertConfirm(form, title, '');

	});

});