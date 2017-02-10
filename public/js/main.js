$( document ).ready(function() {

	$('.show-devs').click(function() {
		if ($('.dev-names').hasClass('hide')) {
			$('.dev-names').removeClass('hide').addClass('show');
		}
		else {
			$('.dev-names').removeClass('show').addClass('hide');
		}
	});

    // Create custom delete alert when we click on a .button-delete
    // @author Dessaules Loïc
    // @modified by Dessauges Antoine
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
		    case "tournament":
		    	title = "Voulez-vous vraiment supprimer le tournois \""+name+"\" ?";
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

  	// Search in a table and display only result who correspond to the search
  	// @author Dessauges Antoine
  	$('.search').on('input',function(e){

    	var search = $('.search').val().toLowerCase();

    	$('.searchIn tr, .searchIn .hideSearch').each( function() {

    		var teamName = $(this).find(".name").text().toLowerCase();

    		if(teamName.indexOf(search) < 0)
    			$(this).hide( "fast");
    		else
    			$(this).show( "fast");

    	});

    });

   	// Open confirm pop-up when select change
  	// @author Dessauges Antoine
  	$( ".addMember" ).change(function() {

		var name = $(this).find("option:selected").text();
		var form = $(this).parent();
		if($(this).attr("name") == "team")
			var title = "Voulez-vous ajouter ce participant à l'équipe \""+name+"\" ?";
		else
  			var title = "Voulez-vous ajouter \""+name+"\" à l'équipe ?";

	  	alertConfirm(form, title, '');

	});


  	/* Add multiple select chooser for the teams which participate on a tournament */
  	// do this if we are on the good page (id of the select exists)
  	if($('#multiple-teams-select').length){
		$("#multiple-teams-select").select2({
			placeholder: 'Choisir une équipe',
	  		allowClear: true
	  	});
	}

  	/* FORM VALIDATIONS */
	// @author Dessaules Loïc
	$('.formSend').click(function(){
		var form = $(this).parent();
		var formId = form.attr('id');
		var error = '';

		switch(formId) {
		    case "formSport":
		    	var nameValue = $('#formSport #name').val();
		    	var descriptionValue = $('#formSport #description').val();

		    	var patternName = /^[a-zA-Z0-9-_ ]{3,20}$/;
		    	var patternDecription = /^[a-zA-Z0-9-_ ]{0,45}$/;

		    	if(!patternName.test(nameValue)){
		    		error += 'Le champ Nom ne doit pas être vide et doit avoir entre 3 et 45 caractères.<br>';
		    	}
		    	if(!patternDecription.test(descriptionValue)){
		    		error += 'Le champ Description peut avoir maximum 45 caractères.<br>';
		    	}
		        break;

	        case "formCourt":
	        	var nameValue = $('#formCourt #name').val();
		    	var sportValue = $('#formCourt #sport').val(); // '' = empty, 1-2-3-... = sport

		    	var patternName = /^[a-zA-Z0-9-_ ]{1,20}$/;
		    	var patternSport = /^[0-9]+$/;

		    	if(!patternName.test(nameValue)){
		    		error += 'Le champ Nom ne doit pas être vide et doit avoir entre 1 et 20 caractères.<br>';
		    	}
		    	if(!patternSport.test(sportValue)){
		    		error += 'Aucun sport sélectionné.<br>';
		    	}
		        break;

		    case "formTournament":
		    	var nameValue = $('#formTournament #name').val();
		    	var sportValue = $('#formTournament #sport').val();
		    	var startDateValue = $('#formTournament #startDate').val();
		    	var startTimeValue = $('#formTournament #startTime').val();
		    	var endDateValue = $('#formTournament #endDate').val();

		    	var patternName = /^[a-zA-Z0-9-_ ]{3,45}$/;
		    	var patternSport = /^[0-9]+$/; // '' = empty, 1-2-3-... = sport
		    	var patternDate = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
		    	var patternTime = /^([01]\d|2[0-3]):?([0-5]\d)$/;

		    	if(!patternName.test(nameValue)){
		    		error += 'Le champ Nom ne doit pas être vide et doit avoir entre 3 et 45 caractères.<br>';
		    	}
		    	if(!patternSport.test(sportValue)){
		    		error += 'Aucun sport sélectionné.<br>';
		    	}
		    	if(!patternTime.test(startTimeValue)){
		    		error += 'Le champ Heure de début ne doit pas être vide et doit être sous la forme hh:mm.<br>';
		    	}
		    	if(!patternDate.test(startDateValue)){
		    		error += 'Le champ Date de début ne doit pas être vide et doit être sous la forme jj.mm.aaaa.<br>';
		    	}
		    	if(!patternDate.test(endDateValue)){
		    		error += 'Le champ Date de début ne doit pas être vide et doit être sous la forme jj.mm.aaaa.<br>';
		    	}
		    	break;
		}

		if(error == ''){
			form.submit();
		}else{
			$('.alert').remove();
			$('.alert-danger').remove();
			$('h1').after(
				'<div class="alert alert-danger">'
				+error
				+'</div>'
			);
		}

	});

});
