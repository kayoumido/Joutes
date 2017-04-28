$(document).ready(function() {

    Schedule.initSchedule(Math.floor($(document).height() / 173));


    setInterval(function() {

        //$('.schedule').empty();
        Schedule.updateSchedule($('.schedule'));

    }, 60 * 1000);


});
