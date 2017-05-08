$(document).ready(function() {

    // get tournament id
    var tournament_id = $('.schedule').data('tournament');

    console.log(tournament_id);

    // get number of matches that can be displayed
    var page_limit = Math.floor($(document).height() / 173);

    Schedule.init(page_limit, tournament_id);

    setInterval(function() {

        //$('.schedule').empty();
        Schedule.refresh($('.schedule'), page_limit, tournament_id);

    }, 10 * 1000); // 60 * 1000ms
});
