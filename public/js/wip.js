$( document ).ready(function() {
	$("table#matches td.action i.fa-pencil").click(function() {
		unlockScore($(this));
	});

	function unlockScore(pencil){
		var tdAction = pencil.parent();
		var tdScore1 = tdAction.parent().children("td.score1");
		var tdScore2 = tdAction.parent().children("td.score2");
		// Get scores of each team
		var score1 = tdScore1.text();
		var score2 = tdScore2.text();
		// Clear the TDs
		tdScore1.empty();
		tdScore2.empty();
		// Create form inputs
		var inputScore1 = document.createElement("input");
		inputScore1.setAttribute('type',"number");
		inputScore1.setAttribute('value',score1);
		var inputScore2 = document.createElement("input");
		inputScore2.setAttribute('type',"number");
		inputScore2.setAttribute('value',score2);
		// Append
		tdScore1.append(inputScore1);
		tdScore2.append(inputScore2);
		// Create and delete icons
		var checkSquare = document.createElement("i");
		checkSquare.className += "fa fa-lg fa-check-square-o";
		checkSquare.setAttribute('aria-hidden',"true");
		var cross = document.createElement("i");
		cross.className += "fa fa-lg fa-times";
		cross.setAttribute('aria-hidden',"true");
		pencil.after(checkSquare);
		checkSquare.after(cross);

		pencil.remove();

		// Discard all things
		$(cross).click(function(){
			// Remove square and cross icons and recreate pencil icon
			tdAction.append(pencil);
			checkSquare.remove();
			cross.remove();
			// Remove inputs
			inputScore1.remove();
			inputScore2.remove();
			// Place old score on the TDs
			tdScore1.append(score1);
			tdScore2.append(score2);

			// Add listener to new pencil recreate
			pencil.click(function(){
				unlockScore($(this));
			});
		});

		$(checkSquare).click(function(){
			if(valid($(inputScore1).val(), $(inputScore2).val())){
				// hide success // error message
				$(".alert").remove();
				// Remove square and cross icons and recreate pencil icon
				tdAction.append(pencil);
				checkSquare.remove();
				cross.remove();
				// Place new score on the TDs
				tdScore1.append($(inputScore1).val());
				tdScore2.append($(inputScore2).val());
				// Remove inputs
				inputScore1.remove();
				inputScore2.remove();

				// Add listener to new pencil recreate
				pencil.click(function(){
					unlockScore($(this));
				});
				// Success message
				var success = $("<div class='alert alert-success' role='alert'>Changement effectué</div>");
				$("#match-block").prepend(success);
				// After 2sec, the alert will disappear
				disappear(success);
				ajaxCall();
			}else{
				// Error message
				$(".alert").remove();
				var error = $("<div class='alert alert-danger' role='alert'>Format de score invalide.</div>");
				$("#match-block").prepend(error);
				// After 2sec, the alert will disappear
				disappear(error);
			}
		});
	}

	function valid(score1, score2){
		var patternNumeric = /^[0-9]{1,3}$/;
		if(!patternNumeric.test(score1) || !patternNumeric.test(score2)){
    		return false;
    	}else{
    		return true;
    	}
	}

	function disappear(alert){
		alert.fadeTo(2000, 500).slideUp(500, function(){
		    alert.slideUp(500);
		});
	}

	function ajaxCall(){
		$.ajax({
            url         : '/admin/tournaments/12/pools/2/games/1',
            method      : 'PUT',
            dataType    : 'html',
            cache       : false,
            headers     : {            
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')        
            },
            data        : {
        		dwdw : 123
            },
            error : function(xhr, options, error) {
                console.log(xhr);
                console.log(options);
                console.log(error);
            },
            success : function(data) {
                console.log(data);
            }
        });
	}


});