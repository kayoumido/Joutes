$( document ).ready(function() {

	$("#shiftMatch").click(function() {

		event.preventDefault(); // cancel the event
		shiftMatch($(this));
	});

	function shiftMatch(self){

		var shiftTime = $('#shiftTime').val();
		var matches = $('#matches tr .separator');


		matches.each(function()
		{
		    var oldTime = $(this).text();

			var a = oldTime.split(':');
			var timeInSecond = (+a[0]) * 60 * 60 + (+a[1]) * 60 ; 

			//add time
			timeInSecond += (10 * 60)
		
			//convert second in string HH:MM:SS
			var newDate = new Date(null);
			newDate.setTime( newDate.getTime() + newDate.getTimezoneOffset()*60*1000 ); // make timezone correcte
			newDate.setSeconds(timeInSecond); 
			var result = newDate.toISOString().substr(11, 8);

			// create var for the dom display and for the DB , the 0 add in start and the slice fix the number for having 14:05:00 instead of 14:5:0
			var dateDOM = ('0'+newDate.getHours()).slice(-2)+":"+('0'+newDate.getMinutes()).slice(-2);
			var dateDB = ('0'+newDate.getHours()).slice(-2)+":"+('0'+newDate.getMinutes()).slice(-2)+":"+('0'+newDate.getSeconds()).slice(-2);

			$(this).text(dateDOM);
	

		});

	

	} //shiftMatch

});