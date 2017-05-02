$(document).ready(function() {

    Schedule.initSchedule(Math.floor($(document).height() / 173));

    setInterval(function() {

        //$('.schedule').empty();
        Schedule.updateSchedule($('.schedule'));

    }, 10 * 1000); // 60 * 1000ms
});
