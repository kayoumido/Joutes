$(document).ready(function() {

    // get number of matches that can be displayed
    var page_limit = Math.floor($(document).height() / 173);

    Schedule.init(page_limit);

    setInterval(function() {

        //$('.schedule').empty();
        Schedule.refresh($('.schedule'), page_limit);

    }, 10 * 1000); // 60 * 1000ms
});
